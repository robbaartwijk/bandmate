<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\User;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Vacancy extends Authenticatable implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'act_id',
        'instrument_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function act()
    {
        return $this->belongsTo('App\Models\Act');
    }

    public function instrument()
    {
        return $this->belongsTo('App\Models\Instrument');
    }

}
