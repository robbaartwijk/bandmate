<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Agency extends Authenticatable implements HasMedia
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'act_id',
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
        'spotify'
    ];

    public function act()
    {
        return $this->hasMany('App\Models\Act');
    }

    public function hasActMedia()
    {
        return $this->media()->count() > 0;
    }

}
