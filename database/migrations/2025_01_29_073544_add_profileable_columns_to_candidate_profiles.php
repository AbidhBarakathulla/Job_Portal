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
        Schema::table('candidate_profiles', function (Blueprint $table) {
            $table->string('profileable_type')->nullable();
            $table->unsignedBigInteger('profileable_id')->nullable();
            $table->index(['profileable_id', 'profileable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_profiles', function (Blueprint $table) {
            //
        });
    }
};
