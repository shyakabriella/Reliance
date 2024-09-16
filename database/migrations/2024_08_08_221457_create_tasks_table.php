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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->foreignId('client_id')->constrained('clients', 'client_id');
            $table->foreignId('assigned_employee')->constrained('employees', 'employee_id');
            $table->enum('status', ['Scheduled', 'Completed', 'Pending', 'Cancelled']);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('duration');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
