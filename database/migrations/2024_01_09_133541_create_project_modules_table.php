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
        Schema::create('project_modules', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectID');
            $table->string('ProjectModule');
            $table->string('Description');
            $table->string('MID');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_modules');
    }
};
