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
            $table->string('bluesky')->nullable()->after('youtubedemo');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acts', function (Blueprint $table) {
            $table->dropColumn('bluesky');
        });
    }
};
