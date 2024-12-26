<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'group',
        'description',
        'type',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['deleted_at'];
    
    public function availableMusician() {
        return $this->hasMany(AvailableMusician::class);
    }
    
}
