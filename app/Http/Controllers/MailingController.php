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

    public function buildMailingOptions()
    {
        $mailingLists = [
            [
                'id' => 1,
                'name' => 'email_notification_all',
                'subscribers_count' => User::where('email_notification_all', true)->count(),
                'description' => 'All email listings',
            ],
            [
                'id' => 2,
                'name' => 'email_notification_acts',
                'subscribers_count' => User::where('email_notification_acts', true)->count(),
                'description' => 'Acts email list',
            ],
            [
                'id' => 3,
                'name' => 'email_notification_vacancies',
                'subscribers_count' => User::where('email_notification_vacancies', true)->count(),
                'description' => 'Vacancies email list',
            ],
            [
                'id' => 4,
                'name' => 'email_notification_availablemusicians',
                'subscribers_count' => User::where('email_notification_availablemusicians', true)->count(),
                'description' => 'Available Musicians email list',
            ],
            [
                'id' => 5,
                'name' => 'email_notification_rehearsalrooms',
                'subscribers_count' => User::where('email_notification_rehearsalrooms', true)->count(),
                'description' => 'Available Rehearsal Rooms email list',
            ],
            [
                'id' => 6,
                'name' => 'email_notification_venues',
                'subscribers_count' => User::where('email_notification_venues', true)->count(),
                'description' => 'Venues email listings',
            ],
            [
                'id' => 7,
                'name' => 'email_notification_agencies',
                'subscribers_count' => User::where('email_notification_agencies', true)->count(),
                'description' => 'Available Agencies email list',
            ],
            [
                'id' => 8,
                'name' => 'email_notification_newsletter',
                'subscribers_count' => User::where('email_notification_newsletter', true)->count(),
                'description' => 'Newsletter email list',
            ],

        ];

        $mailingLists = array_map(function ($list) {
            return (object) $list;
        }, $mailingLists);

        return($mailingLists);
        
    }

}
