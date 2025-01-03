<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProfileController extends BaseController
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = User::find(auth()->user()->id);

        $user->avatar = $user->getFirstMedia('images/AvatarThumbnailPics');

        return view('profile.edit', compact(['user']));
    }

    /**
     * Update the profile
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->fill($request->all());
        $user = $this->processEmailNotifications($user);

        $user->save();

        if ($request->hasFile('AvatarThumbnailPic')) {
            $this->clearUserImage($user);
            $this->storeThumbnailImage($request, $user);
        }

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function processEmailNotifications($user)
    {
        if ($user->email_notification_all == 'on') {
            $user->email_notification_all = 1;
        } else {
            $user->email_notification_all = 0;
        }

        if ($user->email_notification_acts == 'on') {
            $user->email_notification_acts = 1;
        } else {
            $user->email_notification_acts = 0;
        }

        if ($user->email_notification_vacancies == 'on') {
            $user->email_notification_vacancies = 1;
        } else {
            $user->email_notification_vacancies = 0;
        }

        if ($user->email_notification_availablemusicians == 'on') {
            $user->email_notification_availablemusicians = 1;
        } else {
            $user->email_notification_availablemusicians = 0;
        }

        if ($user->email_notification_rehearsalrooms == 'on') {
            $user->email_notification_rehearsalrooms = 1;
        } else {
            $user->email_notification_rehearsalrooms = 0;
        }

        if ($user->email_notification_venues == 'on') {
            $user->email_notification_venues = 1;
        } else {
            $user->email_notification_venues = 0;
        }

        if ($user->email_notification_agencies == 'on') {
            $user->email_notification_agencies = 1;
        } else {
            $user->email_notification_agencies = 0;
        }

        if ($user->email_notification_newsletter == 'on') {
            $user->email_notification_newsletter = 1;
        } else {
            $user->email_notification_newsletter = 0;
        }

        return $user;
    }

    /**
     * Store a newly created image resource in storage.
     */
    public function storeThumbnailImage(Request $request, User $user)
    {
        $user->addMediaFromRequest('AvatarThumbnailPic')
             ->toMediaCollection('images/AvatarThumbnailPics');

        // Create a thumbnail of the image
        $user->getFirstMedia('images/AvatarThumbnailPics')
             ->manipulations(['AvatarThumbnailPic' => ['width' => 100, 'height' => 100]])
             ->save();

    }

    /**
     * Remove the specified image resource from storage.
     */
    public function clearUserImage($user)
    {
        $user->clearMediaCollection('images/AvatarPics');
        $user->clearMediaCollection('images/AvatarThumbnailPics');
    }

}
