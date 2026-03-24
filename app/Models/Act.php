<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Genre;
use App\Models\Vacancy;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Act extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'genre_id',
        'rehearsal_room',
        'number_of_members',
        'description',
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
        'email',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function hasAnyMedia()
    {
        return $this->media()->count() > 0;
    }
}