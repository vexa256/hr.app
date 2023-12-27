<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;

class HRController extends Controller
{


    public function getPositions() {
        try {
            $positions = DB::table('positions')->get();

            return response()->json([
                'status' => 'success',
                'data' => $positions
            ]);
        } catch (\Exception $e) {
            // Return the error details to the frontend
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve positions.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function getDepartments() {
        try {
            $departments = DB::table('departments')->get();

            return response()->json([
                'status' => 'success',
                'data' => $departments
            ]);
        } catch (\Exception $e) {
            // Return the error details to the frontend
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve departments.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getEmployees() {
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

}
