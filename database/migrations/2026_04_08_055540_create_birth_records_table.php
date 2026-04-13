<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('birth_records', function (Blueprint $table) {
            $table->id();
            $table->string('registry_number')->unique();

            // Child Info
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('sex', ['Male', 'Female']);
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('type_of_birth');

            // Mother Info
            $table->string('mother_first_name');
            $table->string('mother_last_name');
            $table->string('mother_citizenship');

            // Father Info
            $table->string('father_first_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('father_citizenship')->nullable();

            // Marriage Info of Parents
            $table->date('parents_marriage_date')->nullable();
            $table->string('parents_marriage_place')->nullable();

            // Attendant & Registration
            $table->string('attendant_type');
            $table->date('date_registered');

            // Staff Tracker
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('birth_records');
    }
};
