<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Act extends Model
{
    use HasFactory;
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
}
