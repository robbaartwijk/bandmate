<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
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
}
