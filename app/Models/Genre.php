<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Availablemusician;

class Genre extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'group',
        'description',
        'type',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function availableMusician() {
        return $this->hasMany( Availablemusician::class );
    }

}
