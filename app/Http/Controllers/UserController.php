<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
 
class UserController extends BaseController
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $sort = $request->input('sort', 'name');
 
        $query = User::withCount(['acts', 'rehearsalrooms', 'vacancies', 'availablemusicians'])
            ->orderBy($sort);
 
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }
 
        $users = $query->get();
 
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
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        
        $this->authorize('update', $user);
        
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('users.index')
        ->with('status', 'User updated successfully');
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
 