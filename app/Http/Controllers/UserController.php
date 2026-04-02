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
        // Whitelist allowed sort columns to prevent SQL injection via orderBy()
        $allowedSorts = ['name', 'email', 'created_at', 'updated_at'];
        $sort = in_array($request->input('sort'), $allowedSorts) ? $request->input('sort') : 'name';

        $query = User::withCount(['acts', 'rehearsalrooms', 'vacancies', 'availablemusicians'])
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
        // Eager load all relationships including nested ones to avoid N+1
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
     *
     * FIX: Added missing `use App\Http\Requests\UpdateUserRequest` import and
     * replaced the undefined `$validated` variable with `$request->validated()`.
     */
    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $user);

        $user->update($request->validated());

        return redirect()->route('users.index')->with('status', 'User updated successfully');
    }
 
    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $user);
        
        $user->delete();
 
        return redirect()->route('users.index')
            ->with('status', 'User deleted successfully');
    }
}