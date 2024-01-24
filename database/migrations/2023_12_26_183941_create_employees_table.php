<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('StaffName', 255);
            $table->string('HOD', 255)->nullable();
            $table->string('AssignedPayroll', 255);
            $table->string('PhoneNumber', 255);
            $table->string('EmployeeType', 255);
            $table->string('Email', 255);
            $table->string('LocalAddress', 255);
            $table->string('PermanentAddress', 255);
            $table->string('PassportOrNationalIdNumber', 255);
            $table->string('IDScan', 255)->nullable();
            $table->string('Nationality', 255);
            $table->date('DOB');
            // $table->string('Designation', 255)->nullable();
            $table->string('Gender', 255)->nullable();
            $table->string('RoleID', 255)->nullable();
            $table->string('ReportsTo', 255)->nullable();
            $table->string('ReportsToRoleID', 255)->nullable();
            $table->string('DepartmentID', 255)->nullable();
            $table->string('ClusterID', 255);
            $table->string('ProjectID', 255);
            $table->decimal('BasicSalaryPerMonthInUsd', 30, 2);
            $table->decimal('TaxableAmount', 10, 2)->nullable();
            $table->string('EmpID', 255);
            $table->string('StaffCode', 255)->nullable();
            $table->date('JoiningDate');
            $table->date('ContractExpiry');
            $table->string('BankName', 255);
            $table->string('BankBranch', 255);
            $table->string('AccountName', 255);
            $table->bigInteger('AccountNumber');
            $table->bigInteger('MonthsToExpiry')->nullable();
            $table->string('TIN', 255)->nullable();
            $table->string('BankCode', 255)->nullable();
            $table->string('StaffPhoto', 255)->nullable();
            $table->string('uuid', 255)->nullable();
            $table->string('RecordStatus', 255)->nullable();

            $table->string('SoonExpiring', 255)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
