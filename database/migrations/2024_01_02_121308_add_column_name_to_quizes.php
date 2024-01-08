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
        Schema::table('quizes', function (Blueprint $table) {
            $table->integer('quiz_time')->after('created_by')->default(60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quizes', function (Blueprint $table) {
            $table->dropColumn('quiz_time');
        });
    }
};
