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
        Schema::table('experience', function (Blueprint $table) {
            $table->decimal('experience_year', 8, 2)->after('job_profile_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experience', function (Blueprint $table) {
            $table->dropColumn('experience_year');
        });
    }
};
