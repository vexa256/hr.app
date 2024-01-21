<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('DepartmentName')->unique();
            $table->string('Description')->unique();
            $table->string('DID')->unique();
            $table->timestamps();
        });




        $departments = [
            ['DepartmentName' => 'Human Resources', 'DID' => 'HR001', 'Description' => 'Handles recruitment, training, and employee relations.'],
            ['DepartmentName' => 'Finance', 'DID' => 'FIN002', 'Description' => 'Manages the organization’s financial planning and monitoring.'],
            ['DepartmentName' => 'IT Services', 'DID' => 'IT003', 'Description' => 'Provides technology support and manages IT infrastructure.'],
            ['DepartmentName' => 'Operations', 'DID' => 'OPS004', 'Description' => 'Oversees day-to-day activities and logistical matters.'],
            ['DepartmentName' => 'Marketing', 'DID' => 'MKT005', 'Description' => 'Focuses on marketing and promotional activities.'],
            ['DepartmentName' => 'Legal Affairs', 'DID' => 'LEGAL006', 'Description' => 'Handles legal compliance and advisories.'],
            ['DepartmentName' => 'Research and Development', 'DID' => 'RD007', 'Description' => 'Responsible for innovation and improving products or services.'],
            ['DepartmentName' => 'Customer Service', 'DID' => 'CS008', 'Description' => 'Manages customer interactions and feedback.'],
            ['DepartmentName' => 'Quality Assurance', 'DID' => 'QA009', 'Description' => 'Ensures the quality of products and services.'],
            ['DepartmentName' => 'Public Relations', 'DID' => 'PR010', 'Description' => 'Manages external communication and image of the organization.']
        ];

        foreach ($departments as $dept) {
            \DB::table('departments')->insert([
                'DepartmentName' => $dept['DepartmentName'],
                'DID' => $dept['DID'],
                'Description' => $dept['Description']
            ]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
