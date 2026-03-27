<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// Note: \Spatie\Image\Image import removed — thumbnail conversion is handled
// automatically by User::registerMediaConversions() ('thumb' at 200×200).

class ProfileController extends BaseController
{
    /**
     * Show the form for editing the profile.
     */
    public function edit(): \Illuminate\View\View
    {
        $user = auth()->user();
        $user->avatar = $user->getFirstMedia('images/AvatarThumbnailPics');

        return view('profile.edit', compact(['user']));
    }

    /**
     * Update the profile
     */
    public function update(ProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();       
        $user->fill($request->validated());
        $user = $this->processEmailNotifications($user, $request);

        $user->save();

        if ($request->hasFile('AvatarThumbnailPic')) {
            $this->clearUserImage($user);
            $this->storeThumbnailImage($request, $user);
        }

        return back()->withStatus(__('profile.saved'));
    }

    public function processEmailNotifications(User $user, Request $request): User   
    {
        $flags = [
          'email_notification_all', 'email_notification_acts',
           'email_notification_vacancies', 'email_notification_availablemusicians',
           'email_notification_rehearsalrooms', 'email_notification_venues',
           'email_notification_agencies', 'email_notification_newsletter',
           ];

        foreach ($flags as $flag) {
           $user->$flag = $request->input($flag) === 'on' ? 1 : 0;
        }
    
        return $user;
    }

    /**
     * Store a newly uploaded avatar via Spatie Media Library.
     *
     * The 'thumb' conversion (200×200) defined in User::registerMediaConversions()
     * is applied automatically by the library after the file is stored — no manual
     * image manipulation is needed or should be done here.
     */
    public function storeThumbnailImage(Request $request, User $user): void
    {
        $user->addMediaFromRequest('AvatarThumbnailPic')
            ->toMediaCollection('images/AvatarThumbnailPics');
    }

    /**
     * Remove the specified image resource from storage.
     */
    public function clearUserImage($user): void
    {
        $user->clearMediaCollection('images/AvatarPics');
        $user->clearMediaCollection('images/AvatarThumbnailPics');
    }

    /**
     * Show the form for editing the profile.
     */
    public function editPassword(): \Illuminate\View\View
    {
        $user = auth()->user();        
        $user->avatar = $user->getFirstMedia('images/AvatarThumbnailPics');

        return view('profile.editpassword', compact(['user']));
    }

    /**
     * Change the password
     */
    public function updatePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'currentpassword' => ['required', 'string', 'min:8'],
            'newpassword' => ['required', 'string', 'min:8'],
            'confirmpassword' => ['required', 'string', 'min:8'],
        ]);

        if (! Hash::check($request->get('currentpassword'), auth()->user()->password)) {
            return redirect()->route('profile.editPassword')
                ->with('status', 'Current password is incorrect.');
        }

        if ($request->get('newpassword') !== $request->get('confirmpassword')) {
            return redirect()->route('profile.editPassword')
                ->with('status', 'New password mismatch.');
        }

        auth()->user()->update(['password' => Hash::make($request->get('newpassword'))]);

        
        return redirect()->route('home')->with('status', 'Password has been updated.');
    }

    public function userdata(): \Illuminate\View\View
    {
        $user = auth()->user()->load('acts', 'vacancies', 'rehearsalrooms', 'availablemusicians');

        $user->image = $user->getFirstMedia('images/AvatarThumbnailPics');

        return view('profile.userdata', compact(['user']));
    }
}