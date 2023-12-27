<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
  public function MassInsert(Request $request)
    {
        // \Log::info($request->allFiles()); // Log all files that are uploaded.

        $TableName     = $request->TableName;
        $tableColumns  = Schema::getColumnListing($TableName);
        $data          = $request->except(['_token', 'id', 'TableName', 'PostRoute']);
        $rules         = [];
        $uploadedFiles = [];

        // Build validation rules based on table columns and input types
        foreach ($tableColumns as $column) {
            if ($request->hasFile($column)) {
                $rules[$column] = 'file|mimes:pdf,doc,docx,jpg,jpeg,png,webp`|max:80000';
            } else {
                $rules[$column] = 'nullable';
            }
        }

        // Validate request data
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422); // You can return any status code you want. 422 is often used for validation errors.
        }

        // Process form data
        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $uploadedFiles[$key] = $this->moveUploadedFile($request->file($key));
            }
        }

        // Insert data into the table
        try {
            unset($data['TableName']);
            unset($data['id']);
            unset($data['PostRoute']);
            unset($data['_token']);
            // unset($data['PostRoute']);

            if ($TableName == 'districts') {

                $PID = DB::table('provinces')->where('ProvinceName', $request->ProvinceID)->first();

                $insertData = array_merge($data, $uploadedFiles);
                DB::table($TableName)->insert($insertData);

                DB::table($TableName)->where('DistrictID', $request->DistrictID)->update([

                    'ProvinceID' => $PID->ProvinceID

                ]);

                return response()->json([
                    [
                        'status' => 'The action executed successfully',
                    ],
                ], 200);
            } else {

                $insertData = array_merge($data, $uploadedFiles);
                DB::table($TableName)->insert($insertData);

                return response()->json([
                    [
                        'status' => 'The action executed successfully',
                    ],
                ], 200);
            }







        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                [
                    'error_a' => 'Failed to insert data.  ' . $e->getMessage(),
                ],
            ]);
        }


    }

    private function moveUploadedFile($file)
    {
        if (!$file) {
            return null;
        }

        $destinationPath = public_path('assets/docs');
        $fileName        = time() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        return 'assets/docs/' . $fileName;
    }

    private function removeNullValues($array)
    {
        return array_filter($array, function ($value) {
            return !is_null($value);
        });
    }

    public function MassUpdate(Request $request)
    {
        $TableName     = $request->TableName;
        $tableColumns  = Schema::getColumnListing($TableName);
        $data          = $request->except(['_token', 'id', 'TableName', 'PostRoute']);
        $rules         = [];
        $uploadedFiles = [];

        // Build validation rules based on table columns and input types
        foreach ($tableColumns as $column) {
            if ($request->hasFile($column)) {
                $rules[$column] = 'file|mimes:pdf,doc,docx,jpg,jpeg,png|max:80000';
            } else {
                $rules[$column] = 'nullable';
            }
        }

        // Validate request data
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422); // You can return any status code you want. 422 is often used for validation errors.
        }

        // Process form data
        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $uploadedFiles[$key] = $this->moveUploadedFile($request->file($key));
            }
        }

        // Update data in the table
        try {

            $updateData = array_merge($data, $uploadedFiles);
            $id         = $request->id;

            // unset($updateData['id']);
            DB::table($TableName)->where('id', $request->id)->update($this->removeNullValues($updateData));
        } catch (\Exception $e) {Log::error($e);

            return response()->json([
                [
                    'error_a' => 'Failed to insert data.  ' . $e->getMessage(),
                ],
            ], 422);
        }

        return response()->json([
            [
                'status' => 'The action executed successfully',
                'data' => $request->all(),
            ],
        ], 200);
    }

    public function MassDelete(Request $request)
    {

        $TableName = $request->TableName;
        $id        = $request->id;



        try {
            if ($TableName == "ebs_structures") {

                $u = DB::table($TableName)->where('id', $id)->first();


                DB::table('users')->where('UserID', $u->UserID)->delete();
            }

            DB::table($TableName)->where('id', $id)->delete();

        } catch (\Exception $e) {Log::error($e);

            return response()->json([
                [
                    'error_a' => 'Failed to delete the record. ' . $e,
                ],
            ], 422);
        }

    }

    // use Illuminate\Support\Facades\Schema;

}
