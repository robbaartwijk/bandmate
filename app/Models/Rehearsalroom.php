<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Rehearsalroom extends Authenticatable implements HasMedia
{
    use SoftDeletes;
    use HasFactory;

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
        'description'
    ];

    public function user()
{
    return $this->belongsTo('App\Models\User');
}

public function hasRehearsalroomMedia()
{
    return $this->media()->count() > 0;
}

}