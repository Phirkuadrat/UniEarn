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
            if (Schema::hasColumn('seekers', 'email')) {
                $table->dropUnique('seekers_email_unique');
                $table->dropColumn('email');
            }
        });

        Schema::table('recruiters', function (Blueprint $table) {
            if (Schema::hasColumn('recruiters', 'email')) {
                $table->dropUnique('recruiters_email_unique');
                $table->dropColumn('email');
                $table->dropColumn('company_email');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seekers', function (Blueprint $table) {
            $table->string('email')->unique()->nullable()->after('name');
        });

        Schema::table('recruiters', function (Blueprint $table) {
            $table->string('email')->unique()->nullable()->after('company_name');
            $table->string('company_email')->unique()->nullable()->after('email');
        });
    }
};
