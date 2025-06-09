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
        Schema::table('portofolio_images', function (Blueprint $table) {
            $table->dropForeign(['portfolio_id']);
            $table->renameColumn('portfolio_id', 'portofolio_id');
        });

        Schema::table('portofolio_images', function (Blueprint $table) {
            $table->foreign('portofolio_id')
                ->references('id')
                ->on('portofolios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portofolio_images', function (Blueprint $table) {
            $table->dropForeign(['portofolio_id']);
            $table->renameColumn('portofolio_id', 'portfolio_id');
        });

        Schema::table('portofolio_images', function (Blueprint $table) {
            $table->foreign('portfolio_id') 
                ->references('id')
                ->on('portofolios')
                ->onDelete('cascade');
        });
    }
};
