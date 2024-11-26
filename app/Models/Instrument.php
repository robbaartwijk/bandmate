<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Vacancy;

class Instrument extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function vacancy() {
        return $this->hasMany(Vacancy::class);
    }
}
