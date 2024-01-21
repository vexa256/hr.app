<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;

class HRController extends Controller
{

    public function getEmployees()
    {
        try {
            $employees = DB::table('employees')->get();

            return response()->json([
                'status' => 'success',
                'data' => $employees
            ]);
        } catch (\Exception $e) {
            // Return the error details to the frontend
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve employees.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateEmployee(Request $request, $id)
    {
        try {
            $employee = DB::table('employees')->find($id);

            if (!$employee) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Employee not found.',
                ], Response::HTTP_NOT_FOUND);
            }

            // Update employee data based on the request
            // Adjust the following lines based on your actual employee schema
            $employeeData = $request->only(['Name', 'Email', 'PhoneNumber', 'DateOfBirth', 'Gender', 'Address', 'City', 'Country']);

            DB::table('employees')->where('id', $id)->update($employeeData);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee updated successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update employee.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteEmployee($id)
    {
        try {
            $employee = DB::table('employees')->find($id);

            if (!$employee) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Employee not found.',
                ], Response::HTTP_NOT_FOUND);
            }

            DB::table('employees')->where('id', $id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Employee deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete employee.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function getOneEmployee(Request $request)
    {
        try {
            $id = $request->input('id');

            $employee = DB::table('employees')->find($id);

            if (!$employee) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Employee not found.',
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'status' => 'success',
                'data' => $employee,
            ]);

        } catch (\Exception $e) {
            // Return the error details to the frontend
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve employee.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


}


