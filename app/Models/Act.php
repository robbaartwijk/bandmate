<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Act extends Authenticatable implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'genre_id',
        'rehearsal_room',
        'number_of_members',
        'website',
        'spotify',
        'soundcloud',
        'youtube',
        'bluesky',
        'youtubedemo',
        'twitter',
        'instagram',
        'facebook',
        'active',
        'description',
        'genre_id',
        'email',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function vacancy()
    {
        return $this->hasMany('App\Models\Vacancy');
    }
     
    public function hasAnyMedia()
    {
        return $this->media()->count() > 0;
    }
}
