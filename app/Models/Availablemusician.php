<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\User;
use App\Models\Genre;
use App\Models\Instrument;
class Availablemusician extends Authenticatable implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'instrument_id',
        'genre_id',
        'description',
        'available_from',
        'available_until'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    public function hasAnyMedia()
    {
        return $this->media()->count() > 0;
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('AvailablemusicianPics')
            ->singleFile();
    }

}
