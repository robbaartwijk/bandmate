<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Act extends Model
{ 
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
        'rehearsal_room',
        'number_of_members',
        'website',
        'active',
        'description',
        'email',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
}