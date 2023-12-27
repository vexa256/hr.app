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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('Name');
            $table->string('UserID')->unique();
            $table->string('EID')->unique();
            $table->string('SupervisorID');
            $table->string('Email')->unique();
            $table->string('PhoneNumber')->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->string('Gender')->nullable();
            $table->string('PassportOrNationalIDNumber')->nullable(); // National ID is commonly used in East Africa
            $table->string('Address')->nullable();
            $table->string('City')->nullable();
            $table->string('Country')->nullable(); // Default to a specific East African country
            $table->string('EmployeeType')->default('International'); // Default to a specific East African country
            $table->string('PID');
            $table->string('BankAccountNumber');
            $table->string('BankAccountName');
            $table->string('BankName');
            $table->string('SalaryPerMonthInUsd');
            $table->string('TaxableSalaryAmountInUsd');
            $table->date('DateOfJoining');
            $table->integer('ContractValidityInMonths');
            $table->string('DID')->nullable();
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
