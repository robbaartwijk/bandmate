<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
 
class UserController extends BaseController
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $allowedSorts = ['name', 'email', 'created_at', 'updated_at'];
        $sort = in_array($request->input('sort'), $allowedSorts) ? $request->input('sort') : 'name';

        $query = User::withCount(['acts', 'rehearsalrooms', 'vacancies', 'availablemusicians'])
            ->with('media')
            ->orderBy($sort);
 
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }
 
        $select = $request->input('selectrecords', 25);
        $users = $query->paginate($select);

        return view('users.index', compact('users'));
    }
 
    /**
     * Display the specified user.
     */
    public function show(User $user): \Illuminate\View\View
    {
        $user->load([
            'acts.genre',
            'vacancies.instrument',
            'vacancies.act',
            'rehearsalrooms',
            'availablemusicians',
        ]);
 
        $user->image = $user->getFirstMedia('images/AvatarThumbnailPics');
 
        return view('users.show', compact('user'));
    }
 
    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user): \Illuminate\View\View
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }
 
    /**
     * Update the specified user in storage.
     */
    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $user);

        $user->update($request->validated());

        if ($request->hasFile('userpic')) {
            $user->clearMediaCollection('images/AvatarThumbnailPics');
            $user->addMediaFromRequest('userpic')
                ->toMediaCollection('images/AvatarThumbnailPics');
        }

        return redirect()->route('users.index')->with('status', 'User updated successfully');
    }
 
    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $user);

        $user->clearMediaCollection('images/AvatarThumbnailPics');
        $user->delete();
 
        return redirect()->route('users.index')
            ->with('status', 'User deleted successfully');
    }
}
