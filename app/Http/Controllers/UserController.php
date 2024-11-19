<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Genre;
use App\Models\Vacancy;
use App\Models\Instrument;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all()->sortBy('name');
        
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {        
        $rehearsalrooms = $user->rehearsalrooms()->get();
        $acts = $user->acts()->get();

        foreach($acts as $act) {
            $genre = Genre::find($act->genre_id);
            $act->genre = $genre->name;

            $vacancies = Vacancy::where('user_id', $act->user_id)->get();
            $act->vacancies = $vacancies;

            foreach($vacancies as $vacancy) {
                $instrument = Instrument::find($vacancy->instrument_id);
                $vacancy->instrument = $instrument->name;
            }

        }

        return view('users.show', compact('user', 'rehearsalrooms', 'acts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
