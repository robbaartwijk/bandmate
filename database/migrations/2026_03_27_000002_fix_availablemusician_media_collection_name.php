<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Fix: rename the Spatie Media Library collection_name for Availablemusician
 * records from the old value ('AvailablemusicianPics') to the value that
 * matches what the model and controller actually use ('images/AvailablemusicianPics').
 *
 * Background
 * ----------
 * Availablemusician::registerMediaCollections() previously registered the
 * singleFile() constraint under the name 'AvailablemusicianPics', but the
 * controller stored and retrieved media under 'images/AvailablemusicianPics'.
 * Because the names did not match, the singleFile() constraint was never
 * enforced and duplicate images accumulated for each musician on every update.
 *
 * The model has been fixed to use 'images/AvailablemusicianPics'; this
 * migration brings any existing rows in the media table into line with
 * that correction.
 */
return new class extends Migration
{
    private const MODEL  = 'App\\Models\\Availablemusician';
    private const OLD    = 'AvailablemusicianPics';
    private const NEW    = 'images/AvailablemusicianPics';

    public function up(): void
    {
        DB::table('media')
            ->where('model_type',       self::MODEL)
            ->where('collection_name',  self::OLD)
            ->update(['collection_name' => self::NEW]);
    }

    /**
     * Roll back by renaming the collection back to the legacy value.
     * Note: this restores the orphaned-media situation, so it should only
     * be used during active development — not on a production database.
     */
    public function down(): void
    {
        DB::table('media')
            ->where('model_type',       self::MODEL)
            ->where('collection_name',  self::NEW)
            ->update(['collection_name' => self::OLD]);
    }
};
