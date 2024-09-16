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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id'); // Primary key
            $table->string('name');  // VARCHAR equivalent
            $table->text('address'); // TEXT type for potentially long addresses
            $table->string('contact_info', 255); // Standard string field
            $table->string('email')->unique(); // Adds an email field with uniqueness constraint
            $table->timestamps(); // Creates created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
