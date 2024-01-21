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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectName');
            $table->string('ProjectID');

            $table->date('StartDate');
            $table->date('EndDate')->nullable();
            $table->string('ProjectStatus');
            // $table->string('ProjectManager');
            $table->decimal('Budget', 19, 4);
            $table->decimal('FundsReceived', 19, 4);
            $table->decimal('Expenditure', 19, 4);
            $table->decimal('Balance', 19, 4);

            $table->timestamps();

            // $table->text('Milestones');
            $table->string('Donors');
            // $table->text('DonorContributions');
            // $table->text('ImpactMetrics');
            $table->string('ProjectDescription');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
