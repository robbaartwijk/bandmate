<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Instrument;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Act;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            $user->availablemusicians_count = $user->availablemusicians->count();
        }

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load(['acts', 'rehearsalrooms', 'vacancies', 'availablemusicians']);

        foreach ($user->acts as $act) {
            $act->genre_name = Genre::find($act->genre_id)->name;
        }

        foreach ($user->vacancies as $vacancy) {
            $vacancy->instrument_name = Instrument::find($vacancy->instrument_id)->name;
            $act = Act::find($vacancy->act_id);
            $vacancy->act_name = $act->name;
        }

        return view('users.show', compact('user'));
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
