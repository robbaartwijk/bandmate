<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Rehearsalroom;
use App\Models\Act;
use App\Models\Vacancy;
use App\Models\Availablemusician;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia {

    use HasApiTokens;
    use InteractsWithMedia;

    // use HasFactory<\Database\Factories\UserFactory>
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'stage_name',
        'email',
        'street',
        'street_number',
        'zip',
        'city',
        'state',
        'country',
        'phone',
        'website',
        'password',
        'email_notification_all',
        'email_notification_acts',
        'email_notification_vacancies',
        'email_notification_availablemusicians',
        'email_notification_rehearsalrooms',
        'email_notification_venues',
        'email_notification_agencies',
        'email_notification_newsletter',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function rehearsalrooms(): HasMany
    {
        return $this->hasMany(Rehearsalroom::class);
    }

    public function acts(): HasMany
    {
        return $this->hasMany(Act::class);
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }

    public function availablemusicians(): HasMany
    {
        return $this->hasMany(Availablemusician::class);
    }

    function isAdmin() {
        return $this->role === 'admin';
    }

    function hasUserMedia() {
        return $this->media()->count() > 0;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)  // Thumbnail width
            ->height(200) // Thumbnail height
            ->sharpen(10); // Optional: sharpen the image
    }
    
}
