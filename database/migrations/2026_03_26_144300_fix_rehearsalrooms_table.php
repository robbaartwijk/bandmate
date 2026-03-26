<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rehearsalrooms', function (Blueprint $table) {
            // Add the price column
            $table->decimal('price', 8, 2)->nullable()->after('description');

            // Make address fields nullable since the form doesn't collect them
            $table->string('address')->nullable()->change();
            $table->string('zip')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('rehearsalrooms', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->string('address')->nullable(false)->change();
            $table->string('zip')->nullable(false)->change();
            $table->string('state')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
        });
    }
};
