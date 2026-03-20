<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Act;
use App\Models\Instrument;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Vacancy extends Model implements HasMedia
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
        return $this->belongsTo(User::class);
    }

    public function act()
    {
        return $this->belongsTo(Act::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    public function hasVacancyMedia()
    {
        return $this->media()->count() > 0;
    }

}
