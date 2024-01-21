<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DataController extends Controller
{

  

    public function GlobalDataFetcher(Request $request)
    {
        $this->FetchClusters();
        $this->FetchProjectModules();
        try {
            // Validate the request
            $validatedData = $request->validate([
                'TableName' => 'required|string',
                'ExcludeColumns' => 'sometimes|array',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors as JSON
            return response()->json(['errors' => $e->errors()], 422);
        }

        $tableName = $request->TableName;
        $excludeColumns = $validatedData['ExcludeColumns'] ?? [];

        // Check if table or view exists
        if (!$this->checkIfTableOrViewExists($tableName)) {
            return response()->json(['error' => 'Table or view not found'], 404);
        }

        // Safely prepare the query
        $query = 'SHOW COLUMNS FROM ' . DB::getTablePrefix() . $tableName;

        // Fetch column names and types
        $columnsAndTypes = DB::select($query);

        $columnsWithTypes = collect($columnsAndTypes)
            ->reject(function ($col) use ($excludeColumns) {
                return in_array($col->Field, $excludeColumns);
            })
            ->mapWithKeys(function ($col) {
                return [$col->Field => $col->Type];
            })
            ->toArray();

        // Fetch the data from the table or view
        $tableData = DB::table($tableName)->select(array_keys($columnsWithTypes))->get();

        return response()->json([
            'columns' => $columnsWithTypes,
            'data' => $tableData,
        ]);
    }

    /**
     * Check if a table or view exists in the database.
     *
     * @param string $name
     * @return bool
     */
    protected function checkIfTableOrViewExists($name)
    {
        $database = DB::connection()->getDatabaseName();
        $exists = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = ? AND (table_name = ? OR table_type = 'VIEW')", [$database, $name]);
        return !empty($exists);
    }

    // Add this function in your controller

    public function fetchRecordById(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'TableName' => 'required|string',
                'id' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors as JSON
            return response()->json(['errors' => $e->errors()], 422);
        }

        $tableName = $request->TableName;
        $id = $validatedData['id'];

        // Check if table exists
        if (!$this->checkIfTableOrViewExists($tableName)) {
            return response()->json(['error' => 'Table not found'], 404);
        }

        // Fetch the record
        $record = DB::table($tableName)->where('id', $id)->first();

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Fetch column names and types
        $columnsAndTypes = DB::select('SHOW COLUMNS FROM ' . DB::getTablePrefix() . $tableName);

        $columnsWithTypes = collect($columnsAndTypes)->mapWithKeys(function ($col) {
            return [$col->Field => $col->Type];
        })->toArray();

        return response()->json([
            'columns' => $columnsWithTypes,
            'data' => $record,
        ]);
    }

    public function VueFormfetchRecordById(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'TableName' => 'required|string',
                'id' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors as JSON
            return response()->json(['errors' => $e->errors()], 422);
        }

        $tableName = $request->TableName;
        $id = $validatedData['id'];

        // Check if table exists
        if (!$this->checkIfTableOrViewExists($tableName)) {
            return response()->json(['error' => 'Table not found'], 404);
        }

        // Fetch the record
        $record = DB::table($tableName)->where('id', $id)->first();

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        // Fetch column names and types
        $columnsAndTypes = DB::select('SHOW COLUMNS FROM ' . DB::getTablePrefix() . $tableName);

        $columnsWithTypes = collect($columnsAndTypes)->mapWithKeys(function ($col) {
            // Determine the field type based on the column type
            $fieldType = 'text'; // Default to text type
            if (strpos($col->Type, 'bigint') !== false) {
                $fieldType = 'bigint';
            } elseif (strpos($col->Type, 'decimal') !== false) {
                $fieldType = 'decimal';
            } elseif (strpos($col->Type, 'date') !== false) {
                $fieldType = 'date';
            } elseif (strpos($col->Type, 'timestamp') !== false) {
                $fieldType = 'timestamp';
            }

            return [$col->Field => $fieldType];
        })->toArray();

        // Convert the record to an associative array
        $recordData = (array) $record;

        // Prepare the response data with columns and record data
        $responseData = [
            'columns' => $columnsWithTypes,
            'data' => $recordData,
        ];

        return response()->json($responseData);
    }

    public function FetchClusters()
    {
        // SQL to create or replace the view
        $createViewSQL = "
        CREATE OR REPLACE VIEW cluster_view AS
        SELECT
            D.DepartmentName,
            D.DID,
            C.id,
            C.ClusterName,
            C.CID,
            C.Description as ClusterDescription
        FROM departments AS D
        JOIN clusters AS C ON C.DID = D.DID;
        ";

        // Execute the SQL
        DB::statement($createViewSQL);

        // Fetch data from the newly created or replaced view
        $data = DB::table('cluster_view')->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function FetchProjectModules()
    {
        // SQL to create or replace the view
        $createViewSQL = "
    CREATE OR REPLACE VIEW ProjectModules AS
    SELECT
        P.ProjectName,
       M.*
    FROM projects AS P
    JOIN project_modules AS M ON M.ProjectID = P.ProjectID;
    ";

        // Execute the SQL
        DB::statement($createViewSQL);

        return true;
    }

}