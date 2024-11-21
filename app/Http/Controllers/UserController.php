<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Instrument;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

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
        if (request()->has('sort')) {
            $sort = request()->input('sort');
        } else {
            $sort = 'name';
        }

        $query = User::with(['acts', 'rehearsalrooms', 'vacancies'])->orderBy($sort);

        if (request()->has('search')) {
            $search = request()->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }

        $users = $query->get();

        foreach ($users as $user) {
            $user->acts_count = $user->acts->count();
            $user->rehearsalrooms_count = $user->rehearsalrooms->count();
            $user->vacancies_count = $user->vacancies->count();
        }

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // $users are already sorted by the query
        $rehearsalrooms = $user->rehearsalrooms()->get();

        // get acts of user
        $acts = $user->acts()->get();

        foreach ($acts as $act) {
            $genre = Genre::find($act->genre_id);
            $act->genre = $genre->name;

            $act->vacancies = Vacancy::where('user_id', $act->user_id)->get();

            if ((isset($act->vacancies)) && ($act->vacancies->count() > 0)) {
                $act->vacancies->count = $act->vacancies->count();

                foreach ($act->vacancies as $vacancy) {
                    $instrument = Instrument::find($vacancy->instrument_id);
                    $vacancy->instrument = $instrument->name;
                    $vacancy->description = substr($vacancy->description, 0, 80).'...';
                }
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
            'email' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('status', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('status', 'User deleted successfully');
    }
}
