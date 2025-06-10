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
        Schema::table('seekers', function (Blueprint $table) {
            if (Schema::hasColumn('seekers', 'name')) {
                $table->dropColumn('name');
            }
        });

        Schema::table('recruiters', function (Blueprint $table) {
            if (Schema::hasColumn('recruiters', 'name')) {
                $table->dropColumn('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seekers', function (Blueprint $table) {
            $table->string('name')->nullable()->after('user_id');
        });

        Schema::table('recruiters', function (Blueprint $table) {
            $table->string('name')->nullable()->after('user_id'); 
        });
    }
};