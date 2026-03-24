<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // FIX: replaced 8 separate COUNT queries with a single aggregated query.
        // The original code fired one DB round-trip per mailing list on every page load.
        $columns = [
            'email_notification_all',
            'email_notification_acts',
            'email_notification_vacancies',
            'email_notification_availablemusicians',
            'email_notification_rehearsalrooms',
            'email_notification_venues',
            'email_notification_agencies',
            'email_notification_newsletter',
        ];

        $selectRaw = implode(', ', array_map(
            fn($col) => "SUM(CASE WHEN `{$col}` = 1 THEN 1 ELSE 0 END) AS `{$col}`",
            $columns
        ));

        $counts = DB::table('users')->selectRaw($selectRaw)->first();

        $descriptions = [
            'email_notification_all'               => 'All email listings',
            'email_notification_acts'              => 'Acts email list',
            'email_notification_vacancies'         => 'Vacancies email list',
            'email_notification_availablemusicians'=> 'Available Musicians email list',
            'email_notification_rehearsalrooms'    => 'Available Rehearsal Rooms email list',
            'email_notification_venues'            => 'Venues email listings',
            'email_notification_agencies'          => 'Available Agencies email list',
            'email_notification_newsletter'        => 'Newsletter email list',
        ];

        $mailingLists = [];
        foreach ($columns as $index => $column) {
            $mailingLists[] = (object) [
                'id'               => $index + 1,
                'name'             => $column,
                'subscribers_count'=> (int) ($counts->$column ?? 0),
                'description'      => $descriptions[$column],
            ];
        }

        return $mailingLists;
    }
}