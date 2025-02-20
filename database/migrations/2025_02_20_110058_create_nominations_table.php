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
        Schema::create('nominations', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('first_name');
            $table->string('other_names')->nullable();
            $table->string('phone');
            $table->string('email')->unique();
            $table->date('dob');
            $table->enum('gender', ['male', 'female']);
            $table->string('nationality');
            $table->string('state');
            $table->string('position');
            $table->decimal('amount', 10, 2);
            $table->string('grade');
            $table->string('member_id');
            $table->string('chapter');
            $table->date('year_inducted');
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->string('current_position')->nullable();
            $table->text('contact_address')->nullable();
            $table->text('program_of_contestant_if_elected')->nullable();
            $table->text('profile_of_contestant')->nullable();
            $table->string('status')->default('pending');
            $table->text('transaction_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominations');
    }
};
