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
        Schema::table('acts', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('phone');
            $table->string('instagram')->nullable()->after('phone');
            $table->string('twitter')->nullable()->after('phone');
            $table->string('youtube')->nullable()->after('phone');
            $table->string('soundcloud')->nullable()->after('phone');
            $table->string('spotify')->nullable()->after('phone');
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acts', function (Blueprint $table) {
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('youtube');
            $table->dropColumn('soundcloud');
            $table->dropColumn('spotify');
        });
    }
};
