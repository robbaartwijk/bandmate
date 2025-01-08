<?php

namespace App\Http\Controllers;

class AboutController extends BaseController
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\View\View The about page.
     */
    public function aboutus()
    {        
        return view('about.aboutus');
    }

    public function aboutdatausage()
    {        
        return view('about.aboutdatausage');
    }

    public function aboutacts()
    {        
        return view('about.aboutacts');
    }
 
    public function aboutvacancies()
    {        
        return view('about.aboutvacancies');
    }

    public function aboutavailablemusicians()
    {        
        return view('about.aboutavailablemusicians');
    }
    
    public function aboutrehearsalrooms()
    {        
        return view('about.aboutrehearsalrooms');
    }

    public function aboutvenues()
    {        
        return view('about.aboutvenues');
    }

    public function aboutagencies()
    {        
        return view('about.aboutagencies');
    }

    public function aboutstatistics()
    {        
        return view('about.aboutstatistics');
    }

}
