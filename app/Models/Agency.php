<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Agency extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'zip',
        'city',
        'state',
        'country',
        'phone',
        'email',
        'website',
        'description',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'soundcloud',
        'spotify',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasActMedia()
    {
        return $this->media()->count() > 0;
    }
}