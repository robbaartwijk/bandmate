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
        Schema::create('acts', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('number_of_members')->nullable();
            $table->integer('genre_id');
            $table->boolean('rehearsal_room');
            $table->string('website')->nullable();
            $table->boolean('active');
            $table->string('description')->nullable();
            $table->string('email');
            $table->string('phone');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acts');
    }
};
