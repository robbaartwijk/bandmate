<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MailingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mailingLists = $this->buildMailingOptions();
        return view('mailing.index', ['mailingLists' => $mailingLists]);
    }

    public function buildMailingOptions()
    {
        $mailingLists = [
            [
                'id' => 1,
                'name' => 'email_notification_all',
                'subscribers_count' => 14,
                'description' => 'All email listings',
            ],
            [
                'id' => 2,
                'name' => 'email_notification_acts',
                'subscribers_count' => 24,
                'description' => 'Acts email list',
            ],
            [
                'id' => 3,
                'name' => 'email_notification_vacancies',
                'subscribers_count' => 8,
                'description' => 'Vacancies email list',
            ],
            [
                'id' => 4,
                'name' => 'email_notification_availablemusicians',
                'subscribers_count' => 83,
                'description' => 'Available Musicians email list',
            ],
            [
                'id' => 5,
                'name' => 'email_notification_rehearsalrooms',
                'subscribers_count' => 78,
                'description' => 'Available Rehearsal Rooms email list',
            ],
            [
                'id' => 6,
                'name' => 'email_notification_venues',
                'subscribers_count' => 2,
                'description' => 'Venues email listings',
            ],
            [
                'id' => 7,
                'name' => 'email_notification_agencies',
                'subscribers_count' => 34,
                'description' => 'Available Agencies email list',
            ],
            [
                'id' => 8,
                'name' => 'email_notification_newsletter',
                'subscribers_count' => 32,
                'description' => 'Newsletter email list',
            ],

        ];

        $mailingLists = array_map(function ($list) {
            return (object) $list;
        }, $mailingLists);

        return($mailingLists);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($mailingListId)
    {
        $mailingLists = $this->buildMailingOptions();

        $mailingList = collect($mailingLists)->firstWhere('id', $mailingListId);
        $subscribedUsers = User::where($mailingList->name, true)->get()->sortBy('name');

        return view('mailing.show', ['mailingList' => $mailingList, 'subscribedUsers' => $subscribedUsers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required',
            'group' => 'required',
        ]);

        $genre->update($request->all());

        return redirect()->route('genres.index')
            ->with('status', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index')
            ->with('status', 'Genre deleted successfully');
    }
}
