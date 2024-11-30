<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Act;
use App\Models\Instrument;

class Vacancy extends Model {
    
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'act_id',
        'instrument_id',
        'description'
    ];

    public function user() {
        return $this->belongsTo( 'App\Models\User' );
    }

    public function act() {
        return $this->belongsTo( 'App\Models\Act' );
    }

    public function instrument() {
        return $this->hasOne( 'App\Models\Instrument' );
    }
}
