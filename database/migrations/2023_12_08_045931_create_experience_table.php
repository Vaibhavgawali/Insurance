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
        Schema::create('experience', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('is_current_company')->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->string('ctc')->nullable();
            $table->string('state')->nullable();
            $table->string('job_profile_description')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('relieving_date')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};
