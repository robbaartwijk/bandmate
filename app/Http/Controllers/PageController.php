<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Artist;
use App\Models\Instrument;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('pages.icons');
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display bands page
     *
     * @return \Illuminate\View\View
     */
    public function bands()
    {
        $bands = Band::all()->sortBy('name');;
        return view('pages.bands', compact('bands'));
    }

     /**
     * Display artists page
     *
     * @return \Illuminate\View\View
     */
    public function artists()
    {
        $artists = Artist::all()->sortBy('name');;
        return view('pages.artists', compact('artists'));
    }

     /**
     * Display instruments page
     *
     * @return \Illuminate\View\View
     */
    public function instruments()
    {
        $instruments = Instrument::all()->sortBy('name');
        return view('pages.instruments', compact('instruments'));
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }
}
