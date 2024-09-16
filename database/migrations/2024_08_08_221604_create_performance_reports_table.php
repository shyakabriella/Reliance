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
        Schema::create('performance_reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->foreignId('task_id')->constrained('tasks', 'task_id');
            $table->foreignId('employee_id')->constrained('employees', 'employee_id');
            $table->integer('quality_rating');
            $table->integer('efficiency_rating');
            $table->date('report_date');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_reports');
    }
};
