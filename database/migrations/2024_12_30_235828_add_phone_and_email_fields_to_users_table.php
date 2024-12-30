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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('name');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('stage_name')->nullable()->after('last_name');
            $table->string('street')->nullable()->after('email');
            $table->string('street_number')->nullable()->after('street');
            $table->string('city')->nullable()->after('street_number');
            $table->string('zip')->nullable()->after('city');
            $table->string('country')->nullable()->after('zip');
            $table->string('state')->nullable()->after('country');
            $table->string('phone')->nullable()->after('password');
            $table->string('website')->nullable()->after('phone');
            $table->boolean('email_notification_all')->nullable()->after('website');
            $table->boolean('email_notification_acts')->nullable()->after('email_notification_all');
            $table->boolean('email_notification_vacancies')->nullable()->after('email_notification_acts');
            $table->boolean('email_notification_availablemusicians')->nullable()->after('email_notification_vacancies');
            $table->boolean('email_notification_rehearsalrooms')->nullable()->after('email_notification_availablemusicians');
            $table->boolean('email_notification_venues')->nullable()->after('email_notification_rehearsalrooms');
            $table->boolean('email_notification_agencies')->nullable()->after('email_notification_venues');
            $table->boolean('email_notification_newsletter')->nullable()->after('email_notification_agencies');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('stage_name');
            $table->dropColumn('street');
            $table->dropColumn('street_number');
            $table->dropColumn('city');
            $table->dropColumn('zip');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('phone');
            $table->dropColumn('website');
            $table->dropColumn('email_notification_all');
            $table->dropColumn('email_notification_acts');
            $table->dropColumn('email_notification_vacancies');
            $table->dropColumn('email_notification_availablemusicians');
            $table->dropColumn('email_notification_rehearsalrooms');
            $table->dropColumn('email_notification_venues');
            $table->dropColumn('email_notification_agencies');
            $table->dropColumn('email_notification_newsletter');
            $table->dropSoftDeletes();
        });
    }
};
