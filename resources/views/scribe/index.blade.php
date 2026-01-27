<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Bandmate API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://www.bandmate.online";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GET_debugbar-open">
                                <a href="#endpoints-GET_debugbar-open">GET _debugbar/open</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GET_debugbar-clockwork--id-">
                                <a href="#endpoints-GET_debugbar-clockwork--id-">Return Clockwork output</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GET_debugbar-assets-stylesheets">
                                <a href="#endpoints-GET_debugbar-assets-stylesheets">Return the stylesheets for the Debugbar</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GET_debugbar-assets-javascript">
                                <a href="#endpoints-GET_debugbar-assets-javascript">Return the javascript for the Debugbar</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETE_debugbar-cache--key---tags--">
                                <a href="#endpoints-DELETE_debugbar-cache--key---tags--">Forget a cache key</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POST_debugbar-queries-explain">
                                <a href="#endpoints-POST_debugbar-queries-explain">Generate explain data for query.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlogin">
                                <a href="#endpoints-GETlogin">Show the application's login form.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogin">
                                <a href="#endpoints-POSTlogin">Handle a login request to the application.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogout">
                                <a href="#endpoints-POSTlogout">Log the user out of the application.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETforgot-password">
                                <a href="#endpoints-GETforgot-password">Show the reset password link request view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETreset-password--token-">
                                <a href="#endpoints-GETreset-password--token-">Show the new password view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTforgot-password">
                                <a href="#endpoints-POSTforgot-password">Send a reset link to the given user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTreset-password">
                                <a href="#endpoints-POSTreset-password">Reset the user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETregister">
                                <a href="#endpoints-GETregister">Show the application registration form.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTregister">
                                <a href="#endpoints-POSTregister">Handle a registration request for the application.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTuser-profile-information">
                                <a href="#endpoints-PUTuser-profile-information">Update the user's profile information.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTuser-password">
                                <a href="#endpoints-PUTuser-password">Update the user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-confirm-password">
                                <a href="#endpoints-GETuser-confirm-password">Show the confirm password view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-confirmed-password-status">
                                <a href="#endpoints-GETuser-confirmed-password-status">Get the password confirmation status.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTuser-confirm-password">
                                <a href="#endpoints-POSTuser-confirm-password">Confirm the user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETtwo-factor-challenge">
                                <a href="#endpoints-GETtwo-factor-challenge">Show the two factor authentication challenge view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTtwo-factor-challenge">
                                <a href="#endpoints-POSTtwo-factor-challenge">Attempt to authenticate a new session using the two factor authentication code.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTuser-two-factor-authentication">
                                <a href="#endpoints-POSTuser-two-factor-authentication">Enable two factor authentication for the user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTuser-confirmed-two-factor-authentication">
                                <a href="#endpoints-POSTuser-confirmed-two-factor-authentication">Enable two factor authentication for the user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEuser-two-factor-authentication">
                                <a href="#endpoints-DELETEuser-two-factor-authentication">Disable two factor authentication for the user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-two-factor-qr-code">
                                <a href="#endpoints-GETuser-two-factor-qr-code">Get the SVG element for the user's two factor authentication QR code.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-two-factor-secret-key">
                                <a href="#endpoints-GETuser-two-factor-secret-key">Get the current user's two factor authentication setup / secret key.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-two-factor-recovery-codes">
                                <a href="#endpoints-GETuser-two-factor-recovery-codes">Get the two factor authentication recovery codes for authenticated user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTuser-two-factor-recovery-codes">
                                <a href="#endpoints-POSTuser-two-factor-recovery-codes">Generate a fresh set of two factor authentication recovery codes.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-profile">
                                <a href="#endpoints-GETuser-profile">Show the user profile screen.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-api-tokens">
                                <a href="#endpoints-GETuser-api-tokens">Show the user API token screen.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETsanctum-csrf-cookie">
                                <a href="#endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlivewire-livewire-js">
                                <a href="#endpoints-GETlivewire-livewire-js">GET livewire/livewire.js</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlivewire-livewire-min-js-map">
                                <a href="#endpoints-GETlivewire-livewire-min-js-map">GET livewire/livewire.min.js.map</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlivewire-upload-file">
                                <a href="#endpoints-POSTlivewire-upload-file">POST livewire/upload-file</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlivewire-preview-file--filename-">
                                <a href="#endpoints-GETlivewire-preview-file--filename-">GET livewire/preview-file/{filename}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETup">
                                <a href="#endpoints-GETup">GET up</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GET-">
                                <a href="#endpoints-GET-">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETdashboard">
                                <a href="#endpoints-GETdashboard">GET dashboard</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETpassword-reset">
                                <a href="#endpoints-GETpassword-reset">Display the form to request a password reset link.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTpassword-email">
                                <a href="#endpoints-POSTpassword-email">Send a reset link to the given user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETpassword-reset--token-">
                                <a href="#endpoints-GETpassword-reset--token-">Display the password reset view for the given token.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTpassword-reset">
                                <a href="#endpoints-POSTpassword-reset">Reset the given user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETpassword-confirm">
                                <a href="#endpoints-GETpassword-confirm">Display the password confirmation view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTpassword-confirm">
                                <a href="#endpoints-POSTpassword-confirm">Confirm the given user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GEThome">
                                <a href="#endpoints-GEThome">Show the application dashboard.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETinstruments">
                                <a href="#endpoints-GETinstruments">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETinstruments-create">
                                <a href="#endpoints-GETinstruments-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTinstruments">
                                <a href="#endpoints-POSTinstruments">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETinstruments--id-">
                                <a href="#endpoints-GETinstruments--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETinstruments--instrument_id--edit">
                                <a href="#endpoints-GETinstruments--instrument_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTinstruments--id-">
                                <a href="#endpoints-PUTinstruments--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEinstruments--id-">
                                <a href="#endpoints-DELETEinstruments--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETgenres">
                                <a href="#endpoints-GETgenres">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETgenres-create">
                                <a href="#endpoints-GETgenres-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTgenres">
                                <a href="#endpoints-POSTgenres">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETgenres--id-">
                                <a href="#endpoints-GETgenres--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETgenres--genre_id--edit">
                                <a href="#endpoints-GETgenres--genre_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTgenres--id-">
                                <a href="#endpoints-PUTgenres--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEgenres--id-">
                                <a href="#endpoints-DELETEgenres--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETrehearsalrooms">
                                <a href="#endpoints-GETrehearsalrooms">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETrehearsalrooms-create">
                                <a href="#endpoints-GETrehearsalrooms-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTrehearsalrooms">
                                <a href="#endpoints-POSTrehearsalrooms">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETrehearsalrooms--id-">
                                <a href="#endpoints-GETrehearsalrooms--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETrehearsalrooms--rehearsalroom_id--edit">
                                <a href="#endpoints-GETrehearsalrooms--rehearsalroom_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTrehearsalrooms--id-">
                                <a href="#endpoints-PUTrehearsalrooms--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETErehearsalrooms--id-">
                                <a href="#endpoints-DELETErehearsalrooms--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETusers">
                                <a href="#endpoints-GETusers">Display a listing of the users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETusers--id-">
                                <a href="#endpoints-GETusers--id-">GET users/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETusers--user_id--edit">
                                <a href="#endpoints-GETusers--user_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTusers--id-">
                                <a href="#endpoints-PUTusers--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEusers--id-">
                                <a href="#endpoints-DELETEusers--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETacts">
                                <a href="#endpoints-GETacts">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETacts-create">
                                <a href="#endpoints-GETacts-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTacts">
                                <a href="#endpoints-POSTacts">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETacts--id-">
                                <a href="#endpoints-GETacts--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETacts--act_id--edit">
                                <a href="#endpoints-GETacts--act_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTacts--id-">
                                <a href="#endpoints-PUTacts--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEacts--id-">
                                <a href="#endpoints-DELETEacts--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvacancies">
                                <a href="#endpoints-GETvacancies">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvacancies-create">
                                <a href="#endpoints-GETvacancies-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTvacancies">
                                <a href="#endpoints-POSTvacancies">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvacancies--id-">
                                <a href="#endpoints-GETvacancies--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvacancies--vacancy_id--edit">
                                <a href="#endpoints-GETvacancies--vacancy_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTvacancies--id-">
                                <a href="#endpoints-PUTvacancies--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEvacancies--id-">
                                <a href="#endpoints-DELETEvacancies--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvenues">
                                <a href="#endpoints-GETvenues">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvenues-create">
                                <a href="#endpoints-GETvenues-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTvenues">
                                <a href="#endpoints-POSTvenues">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvenues--id-">
                                <a href="#endpoints-GETvenues--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETvenues--venue_id--edit">
                                <a href="#endpoints-GETvenues--venue_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTvenues--id-">
                                <a href="#endpoints-PUTvenues--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEvenues--id-">
                                <a href="#endpoints-DELETEvenues--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETagencies">
                                <a href="#endpoints-GETagencies">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETagencies-create">
                                <a href="#endpoints-GETagencies-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTagencies">
                                <a href="#endpoints-POSTagencies">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETagencies--id-">
                                <a href="#endpoints-GETagencies--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETagencies--agency_id--edit">
                                <a href="#endpoints-GETagencies--agency_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTagencies--id-">
                                <a href="#endpoints-PUTagencies--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEagencies--id-">
                                <a href="#endpoints-DELETEagencies--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETavailablemusicians">
                                <a href="#endpoints-GETavailablemusicians">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETavailablemusicians-create">
                                <a href="#endpoints-GETavailablemusicians-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTavailablemusicians">
                                <a href="#endpoints-POSTavailablemusicians">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETavailablemusicians--id-">
                                <a href="#endpoints-GETavailablemusicians--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETavailablemusicians--availablemusician_id--edit">
                                <a href="#endpoints-GETavailablemusicians--availablemusician_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTavailablemusicians--id-">
                                <a href="#endpoints-PUTavailablemusicians--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEavailablemusicians--id-">
                                <a href="#endpoints-DELETEavailablemusicians--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETmailing">
                                <a href="#endpoints-GETmailing">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETmailing--id-">
                                <a href="#endpoints-GETmailing--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstatistics-chart1">
                                <a href="#endpoints-GETstatistics-chart1">Generates chart data for monthly uer registrations.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstatistics-chart2">
                                <a href="#endpoints-GETstatistics-chart2">Generates chart data for vacancies per instrument</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstatistics-chart3">
                                <a href="#endpoints-GETstatistics-chart3">Generates chart data for monthly act registrations.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstatistics-chart4">
                                <a href="#endpoints-GETstatistics-chart4">Generates chart data for available musicians</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstatistics-chart5">
                                <a href="#endpoints-GETstatistics-chart5">Generates chart data for available musicians per instrument</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-us">
                                <a href="#endpoints-GETabout-us">Show the about page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-datausage">
                                <a href="#endpoints-GETabout-datausage">GET about/datausage</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-acts">
                                <a href="#endpoints-GETabout-acts">GET about/acts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-vacancies">
                                <a href="#endpoints-GETabout-vacancies">GET about/vacancies</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-availablemusicians">
                                <a href="#endpoints-GETabout-availablemusicians">GET about/availablemusicians</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-rehearsalrooms">
                                <a href="#endpoints-GETabout-rehearsalrooms">GET about/rehearsalrooms</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-venues">
                                <a href="#endpoints-GETabout-venues">GET about/venues</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-agencies">
                                <a href="#endpoints-GETabout-agencies">GET about/agencies</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout-statistics">
                                <a href="#endpoints-GETabout-statistics">GET about/statistics</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser">
                                <a href="#endpoints-GETuser">Display a listing of the users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser--user_id--edit">
                                <a href="#endpoints-GETuser--user_id--edit">Show the form for editing the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTuser--id-">
                                <a href="#endpoints-PUTuser--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEuser--id-">
                                <a href="#endpoints-DELETEuser--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETprofile">
                                <a href="#endpoints-GETprofile">Show the form for editing the profile.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTprofile">
                                <a href="#endpoints-PUTprofile">Update the profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETeditpassword">
                                <a href="#endpoints-GETeditpassword">Show the form for editing the profile.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETupdatepassword">
                                <a href="#endpoints-GETupdatepassword">Change the password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuserdata">
                                <a href="#endpoints-GETuserdata">GET userdata</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstorage--path-">
                                <a href="#endpoints-GETstorage--path-">GET storage/{path}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlivewire-update">
                                <a href="#endpoints-POSTlivewire-update">POST livewire/update</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 27, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Bandmate API Documentation</p>
<aside>
    <strong>Base URL</strong>: <code>https://www.bandmate.online</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include a <strong><code>Authorization</code></strong> header with the value <strong><code>"{YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GET_debugbar-open">GET _debugbar/open</h2>

<p>
</p>



<span id="example-requests-GET_debugbar-open">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/_debugbar/open" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/_debugbar/open"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET_debugbar-open">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GET_debugbar-open" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET_debugbar-open"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET_debugbar-open"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET_debugbar-open" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET_debugbar-open">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET_debugbar-open" data-method="GET"
      data-path="_debugbar/open"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET_debugbar-open', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET_debugbar-open"
                    onclick="tryItOut('GET_debugbar-open');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET_debugbar-open"
                    onclick="cancelTryOut('GET_debugbar-open');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET_debugbar-open"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>_debugbar/open</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET_debugbar-open"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET_debugbar-open"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GET_debugbar-clockwork--id-">Return Clockwork output</h2>

<p>
</p>



<span id="example-requests-GET_debugbar-clockwork--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/_debugbar/clockwork/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/_debugbar/clockwork/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET_debugbar-clockwork--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GET_debugbar-clockwork--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET_debugbar-clockwork--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET_debugbar-clockwork--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET_debugbar-clockwork--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET_debugbar-clockwork--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET_debugbar-clockwork--id-" data-method="GET"
      data-path="_debugbar/clockwork/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET_debugbar-clockwork--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET_debugbar-clockwork--id-"
                    onclick="tryItOut('GET_debugbar-clockwork--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET_debugbar-clockwork--id-"
                    onclick="cancelTryOut('GET_debugbar-clockwork--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET_debugbar-clockwork--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>_debugbar/clockwork/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET_debugbar-clockwork--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET_debugbar-clockwork--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GET_debugbar-clockwork--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the clockwork. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GET_debugbar-assets-stylesheets">Return the stylesheets for the Debugbar</h2>

<p>
</p>



<span id="example-requests-GET_debugbar-assets-stylesheets">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/_debugbar/assets/stylesheets" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/_debugbar/assets/stylesheets"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET_debugbar-assets-stylesheets">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GET_debugbar-assets-stylesheets" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET_debugbar-assets-stylesheets"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET_debugbar-assets-stylesheets"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET_debugbar-assets-stylesheets" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET_debugbar-assets-stylesheets">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET_debugbar-assets-stylesheets" data-method="GET"
      data-path="_debugbar/assets/stylesheets"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET_debugbar-assets-stylesheets', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET_debugbar-assets-stylesheets"
                    onclick="tryItOut('GET_debugbar-assets-stylesheets');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET_debugbar-assets-stylesheets"
                    onclick="cancelTryOut('GET_debugbar-assets-stylesheets');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET_debugbar-assets-stylesheets"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>_debugbar/assets/stylesheets</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET_debugbar-assets-stylesheets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET_debugbar-assets-stylesheets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GET_debugbar-assets-javascript">Return the javascript for the Debugbar</h2>

<p>
</p>



<span id="example-requests-GET_debugbar-assets-javascript">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/_debugbar/assets/javascript" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/_debugbar/assets/javascript"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET_debugbar-assets-javascript">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GET_debugbar-assets-javascript" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET_debugbar-assets-javascript"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET_debugbar-assets-javascript"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET_debugbar-assets-javascript" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET_debugbar-assets-javascript">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET_debugbar-assets-javascript" data-method="GET"
      data-path="_debugbar/assets/javascript"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET_debugbar-assets-javascript', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET_debugbar-assets-javascript"
                    onclick="tryItOut('GET_debugbar-assets-javascript');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET_debugbar-assets-javascript"
                    onclick="cancelTryOut('GET_debugbar-assets-javascript');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET_debugbar-assets-javascript"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>_debugbar/assets/javascript</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET_debugbar-assets-javascript"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET_debugbar-assets-javascript"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-DELETE_debugbar-cache--key---tags--">Forget a cache key</h2>

<p>
</p>



<span id="example-requests-DELETE_debugbar-cache--key---tags--">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/_debugbar/cache/architecto/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/_debugbar/cache/architecto/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETE_debugbar-cache--key---tags--">
</span>
<span id="execution-results-DELETE_debugbar-cache--key---tags--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETE_debugbar-cache--key---tags--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETE_debugbar-cache--key---tags--"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETE_debugbar-cache--key---tags--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETE_debugbar-cache--key---tags--">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETE_debugbar-cache--key---tags--" data-method="DELETE"
      data-path="_debugbar/cache/{key}/{tags?}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETE_debugbar-cache--key---tags--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETE_debugbar-cache--key---tags--"
                    onclick="tryItOut('DELETE_debugbar-cache--key---tags--');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETE_debugbar-cache--key---tags--"
                    onclick="cancelTryOut('DELETE_debugbar-cache--key---tags--');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETE_debugbar-cache--key---tags--"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>_debugbar/cache/{key}/{tags?}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETE_debugbar-cache--key---tags--"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETE_debugbar-cache--key---tags--"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="key"                data-endpoint="DELETE_debugbar-cache--key---tags--"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tags</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tags"                data-endpoint="DELETE_debugbar-cache--key---tags--"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POST_debugbar-queries-explain">Generate explain data for query.</h2>

<p>
</p>



<span id="example-requests-POST_debugbar-queries-explain">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/_debugbar/queries/explain" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/_debugbar/queries/explain"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POST_debugbar-queries-explain">
</span>
<span id="execution-results-POST_debugbar-queries-explain" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POST_debugbar-queries-explain"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POST_debugbar-queries-explain"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POST_debugbar-queries-explain" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POST_debugbar-queries-explain">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POST_debugbar-queries-explain" data-method="POST"
      data-path="_debugbar/queries/explain"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POST_debugbar-queries-explain', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POST_debugbar-queries-explain"
                    onclick="tryItOut('POST_debugbar-queries-explain');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POST_debugbar-queries-explain"
                    onclick="cancelTryOut('POST_debugbar-queries-explain');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POST_debugbar-queries-explain"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>_debugbar/queries/explain</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POST_debugbar-queries-explain"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POST_debugbar-queries-explain"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETlogin">Show the application&#039;s login form.</h2>

<p>
</p>



<span id="example-requests-GETlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlogin">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=utf-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IlZyUldPbXhKMDJwaHF2L0Fvd2hFWEE9PSIsInZhbHVlIjoiOWgybVFMYnd2TlRmZDlEa0xjSGFrcVR4TFpSZlp5UzhlVHUwZW1SOURyaTRGaG9YVFlZSDN5c1JNTWZxR2NxK0Y5WjEwZUpuTGJKUENVWXk5aWRENHlkNUtsejJSS3psdy9TRGxNbjdHempIdDZ1MXlOSktEa2cwOWpLZU9RUjAiLCJtYWMiOiJlZDYxZWQ4N2M4MDVmNzhjYzlmMDdiY2M1OTU0MzVmNDRkMDNlOTE0ZGUzZjAxMThmZGQ2ZTE4ZDQwODU5YmMwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImlCRTZYWnkyUzZSODV6WWI1MTFZbGc9PSIsInZhbHVlIjoiTWJLOUhEd0k2SWlSMzl6NnQxSWRJd0FtMmJoNStnQXhjbkVZWmRKV29yZklqTHpIQ0FOS1lPN3JGcXhwekJodk9VMWxwdGdpL0VER3IwamRvL2JMSldNSE9VN3JvTzJqWnlXWWVEelBCTDRaM0U2cHZGb1pBbnkrK3RIZHdzZVQiLCJtYWMiOiJkNmZkYzg0MGVlZGQ2NDQyM2YyOGUyNGNiMTgzOWYzYjljMmI4ZjMxOTY4ODk3NTY2ODk3Njc1MGUzNmM0YmE2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;div&gt;

    
&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css&quot;&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chart.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels&quot;&gt;&lt;/script&gt;

import ChartDataLabels from &#039;chartjs-plugin-datalabels&#039;;

&lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;script&gt;
    document.addEventListener(&#039;DOMContentLoaded&#039;, function() {
        const simplemde = new SimpleMDE({
            element: document.getElementById(&quot;description&quot;),

            // configure the toolbar
            toolbar: [
                &quot;bold&quot;, &quot;italic&quot;, &quot;heading&quot;, &quot;|&quot;
                , &quot;quote&quot;, &quot;unordered-list&quot;, &quot;ordered-list&quot;, &quot;|&quot;
                , &quot;link&quot;, &quot;image&quot;
            , ]
        , });
    });

&lt;/script&gt;

&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;

&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;ie=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;

    &lt;meta name=&quot;csrf-token&quot; content=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot;&gt;

    &lt;title&gt;Bandmate&lt;/title&gt;
    &lt;!-- Favicon --&gt;
    &lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;76x76&quot; href=&quot;https://www.bandmate.online/black/img/apple-icon.png&quot;&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;https://www.bandmate.online/black/img/favicon.png&quot;&gt;
    &lt;!-- Fonts --&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://use.fontawesome.com/releases/v5.0.6/css/all.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;link href=&quot;https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;!-- Icons --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/nucleo-icons.css&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;!-- CSS --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/black-dashboard.css?v=1.0.0&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/theme.css&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;/head&gt;

&lt;style&gt;
    body {
        background-image: url(&#039;https://www.bandmate.online/images/Background_sharp.jpg&#039;);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.85;
    }

&lt;/style&gt;

&lt;body class=&quot;gloif login-page&quot;&gt;

    
        &lt;nav class=&quot;navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
        &lt;div class=&quot;navbar-wrapper&quot;&gt;
            &lt;div class=&quot;navbar-toggle d-inline&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;navbar-toggler&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar1&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar2&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar3&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;
            &lt;/div&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;Login Page&lt;/a&gt;
        &lt;/div&gt;
        &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navigation&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navigation&quot;&gt;
            &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online&quot; class=&quot;nav-link text-primary&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-minimal-left&quot;&gt;&lt;/i&gt; &lt;span style=&quot;color: lightgray;&quot;&gt;Back to Welcome Page&lt;/span&gt;
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/register&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-laptop&quot;&gt;&lt;/i&gt; Register
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/login&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-single-02&quot;&gt;&lt;/i&gt; Login
                    &lt;/a&gt;
                &lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
    &lt;div class=&quot;wrapper wrapper-full-page&quot;&gt;
        &lt;div class=&quot;full-page login-page&quot;&gt;
            &lt;div class=&quot;content&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                    
    &lt;div class=&quot;col-lg-7 col-md- ml-auto mr-auto&quot;&gt;
        &lt;form method=&quot;POST&quot; action=&quot;https://www.bandmate.online/login&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot; autocomplete=&quot;off&quot;&gt;
            &lt;div class=&quot;bm_card card&quot; style=&quot;min-height: 500px;&quot;&gt;
                
                &lt;div class=&quot;card-header&quot;&gt;
                    &lt;h1 class=&quot;card-title&quot;&gt;Log in&lt;/h1&gt;
                &lt;/div&gt;

                &lt;div class=&quot;card-body&quot; style=&quot;margin-top:90px&quot;&gt;
                    &lt;p class=&quot;text-white mb-2&quot;&gt;&lt;strong&gt;Sign in with your email and password&lt;/strong&gt;&lt;/p&gt;

                    &lt;div class=&quot;input-group&quot;&gt;
                        &lt;div class=&quot;input-group-prepend&quot;&gt;
                            &lt;div class=&quot;input-group-text&quot;&gt;
                                &lt;i class=&quot;tim-icons icon-email-85&quot;&gt;&lt;/i&gt;
                            

                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;input type=&quot;email&quot; name=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Email&quot;&gt;
                                            &lt;/div&gt;
                    &lt;div class=&quot;input-group&quot;&gt;
                        &lt;div class=&quot;input-group-prepend&quot;&gt;
                            &lt;div class=&quot;input-group-text&quot;&gt;
                                &lt;i class=&quot;tim-icons icon-lock-circle&quot;&gt;&lt;/i&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;input type=&quot;password&quot; placeholder=&quot;Password&quot; name=&quot;password&quot; class=&quot;form-control&quot;&gt;
                                            &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;card-footer&quot;&gt;
                    &lt;button type=&quot;submit&quot; class=&quot;btn btn-info btn-lg btn-block mb-3&quot;&gt;Log in&lt;/button&gt;
                    &lt;div class=&quot;pull-right&quot;&gt;
                        &lt;h6&gt;
                            &lt;a href=&quot;https://www.bandmate.online/password/reset&quot; class=&quot;link footer-link&quot;&gt;Forgot password?&lt;/a&gt;
                        &lt;/h6&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;footer style=&quot;opacity: 0.85;&quot; ; class=&quot;footer&quot;&gt;
    &lt;footer class=&quot;footer&quot;&gt;
        &lt;div class=&quot;container-fluid&quot;&gt;
            &lt;div class=&quot;copyright text-left&quot;&gt;
                &lt;b&gt;Version 1.0&lt;/b&gt;
            &lt;/div&gt;
            &lt;div class=&quot;copyright text-right&quot;&gt;
                &amp;copy; 2026 Copyright Rob Baartwijk
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/div&gt;
        &lt;script src=&quot;https://www.bandmate.online/black/js/core/jquery.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/popper.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/bootstrap.min.js&quot;&gt;&lt;/script&gt;
    &lt;!--  Google Maps Plugin    --&gt;
    &lt;!-- Place this tag in your head or just before your close body tag. --&gt;
    
    &lt;!-- Chart JS --&gt;
    
    &lt;!--  Notifications Plugin    --&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/plugins/bootstrap-notify.js&quot;&gt;&lt;/script&gt;

    &lt;script src=&quot;https://www.bandmate.online/black/js/black-dashboard.min.js?v=1.0.0&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/theme.js&quot;&gt;&lt;/script&gt;

    
    &lt;script&gt;
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $(&#039;.sidebar&#039;);
                $navbar = $(&#039;.navbar&#039;);
                $main_panel = $(&#039;.main-panel&#039;);

                $full_page = $(&#039;.full-page&#039;);

                $sidebar_responsive = $(&#039;body &gt; .navbar-collapse&#039;);
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $(&#039;.sidebar .sidebar-wrapper .nav li.active a p&#039;).html();

                $(&#039;.fixed-plugin a&#039;).click(function(event) {
                    if ($(this).hasClass(&#039;switch-trigger&#039;)) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $(&#039;.fixed-plugin .background-color span&#039;).click(function() {
                    $(this).siblings().removeClass(&#039;active&#039;);
                    $(this).addClass(&#039;active&#039;);

                    var new_color = $(this).data(&#039;color&#039;);

                    if ($sidebar.length != 0) {
                        $sidebar.attr(&#039;data&#039;, new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr(&#039;data&#039;, new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr(&#039;filter-color&#039;, new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr(&#039;data&#039;, new_color);
                    }
                });

                $(&#039;.switch-sidebar-mini input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $(&#039;body&#039;).removeClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini deactivated...&#039;);
                    } else {
                        $(&#039;body&#039;).addClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini activated...&#039;);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event(&#039;resize&#039;));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $(&#039;.switch-change-color input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).removeClass(&#039;white-content&#039;);
                        }, 900);
                        white_color = false;
                    } else {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).addClass(&#039;white-content&#039;);
                        }, 900);

                        white_color = true;
                    }
                });
            });
        });

    &lt;/script&gt;
    &lt;/body&gt;

&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlogin" data-method="GET"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlogin"
                    onclick="tryItOut('GETlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlogin"
                    onclick="cancelTryOut('GETlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlogin">Handle a login request to the application.</h2>

<p>
</p>



<span id="example-requests-POSTlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlogin">
</span>
<span id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogin" data-method="POST"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogin"
                    onclick="tryItOut('POSTlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogin"
                    onclick="cancelTryOut('POSTlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlogout">Log the user out of the application.</h2>

<p>
</p>



<span id="example-requests-POSTlogout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlogout">
</span>
<span id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogout" data-method="POST"
      data-path="logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogout"
                    onclick="tryItOut('POSTlogout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogout"
                    onclick="cancelTryOut('POSTlogout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlogout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETforgot-password">Show the reset password link request view.</h2>

<p>
</p>



<span id="example-requests-GETforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETforgot-password">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkRaSk1VNlpQWDhQWHNML1g3Qk0wYkE9PSIsInZhbHVlIjoia0IzMVhNbWpGVGVldU1CS1UzdTRybDZEZWtleVZubnBZRnVsTXVyYnJCQjFOZk1ZdUNKTlJFYVppY3dOQXZ4cWl3UHBGSVM1RXVJZHVxQUdUY1UxZFQwS3RDdDdkRnRUOXRrZHM5dUdad2tzKzJHYUM3TU1ZQkhzYlp4eWdqTUYiLCJtYWMiOiJlMDFhNjMwNWI4YzY1NDNhYTA0MGFkYjA1OGFhNjdjNTUwZGI1MTI5MzY3MTA1NGUwOTIyMTVhZWRmZjBjYzI2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IkQzNmRWN2FKVkkzQWFkV0VOK1JCRWc9PSIsInZhbHVlIjoiUGxwWnBOSkRPVnk1RXVZcEw2dnZIako3NVJ2eGlaM0RPTjhSQk1FSmJBd1h6SmFFS2t0b3d4WWYwNUcrY1Qzam85LzlQaC9GTEowRHYvOEFvbEJBaGVXZkJyandWdmNia2ZhY2Nsd3l0enRvMkZyY3dEK3lJV2dhTXpFUzFJSmoiLCJtYWMiOiI5MWVhYTY4NWQ4NzZhYTlhNjQzZTExYjQxZTZmZjJjNzZhMzZmMzEyMzg1MzkyMmM5YTBmNjllY2U1MGEwNGU0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETforgot-password" data-method="GET"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETforgot-password"
                    onclick="tryItOut('GETforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETforgot-password"
                    onclick="cancelTryOut('GETforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETreset-password--token-">Show the new password view.</h2>

<p>
</p>



<span id="example-requests-GETreset-password--token-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/reset-password/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/reset-password/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETreset-password--token-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImZEM1lVckF4NjB1V0lERW1JU0NZQkE9PSIsInZhbHVlIjoiODJvOHU5eWw5bk9ESnZWa3VKMUhVRk5sSVpSQ2d1SVpXa1pObXpwUnVPcHpsV0lxUXJuWTBEczdBQ1ZwZnovZ29JQkp5bkFuZVNFcFViRmFqcjRQcWhHWHBSOWgxekFZNTVDRWlsTlRWUitBMGU4TmNFdUhpaFFJWTNzMkkvRW8iLCJtYWMiOiI4ZGNlZjAxYzM3YmNjYWM2Y2MwMWU3NTYxMTRlOTM1ZGIyYjc0ZTQ3MTVlZmE3YjU2NTc0NDJmNWJhZmY0YjdhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImQwb2prZEU3TmwzekltM2dsY083MEE9PSIsInZhbHVlIjoia2JzSS9VbWlTY0NTdVBXY1ZUYkQ1T3Zyc3VuQWQ1Q2RQTmZ1SXJ0bWlVRzg3WVZKWDkrSjRzOHNZekJzS2ErVWVPaFVnSXZkQ2N5REhIM3JJRnY3cythV2RyQ211dHlHSHhjMUdFTHl6aHBrckFyQnZaV2ZKZ0o3THE5akpmT2wiLCJtYWMiOiJlNjZhN2U1N2MyNmRmNzU3MzM5OGRmZGY5MjBlZDJkZmY2MGVhZDAxZDQxZGU0MWI1ZjY0YWRjZDI1NmIwMjEwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETreset-password--token-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETreset-password--token-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETreset-password--token-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETreset-password--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreset-password--token-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETreset-password--token-" data-method="GET"
      data-path="reset-password/{token}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETreset-password--token-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETreset-password--token-"
                    onclick="tryItOut('GETreset-password--token-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETreset-password--token-"
                    onclick="cancelTryOut('GETreset-password--token-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETreset-password--token-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>reset-password/{token}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETreset-password--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETreset-password--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="GETreset-password--token-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTforgot-password">Send a reset link to the given user.</h2>

<p>
</p>



<span id="example-requests-POSTforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTforgot-password">
</span>
<span id="execution-results-POSTforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTforgot-password" data-method="POST"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTforgot-password"
                    onclick="tryItOut('POSTforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTforgot-password"
                    onclick="cancelTryOut('POSTforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTforgot-password"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTreset-password">Reset the user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-POSTreset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"architecto\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "architecto",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTreset-password">
</span>
<span id="execution-results-POSTreset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTreset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTreset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTreset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTreset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTreset-password" data-method="POST"
      data-path="reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTreset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTreset-password"
                    onclick="tryItOut('POSTreset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTreset-password"
                    onclick="cancelTryOut('POSTreset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTreset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTreset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTreset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETregister">Show the application registration form.</h2>

<p>
</p>



<span id="example-requests-GETregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETregister">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=utf-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6ImppbDg0dWQxR3ZqenlmUmJPN1N6M2c9PSIsInZhbHVlIjoiMU8wMUZ6MVhXSGU1TzFRUERPUVVISGZMSWdhVVBrMlFmSy9hSXlPRExIQzhjblZGa09MVjhsL0QvUURKcGc3bEJ3d3dBdEJzUVgwZUl0dDNrdkhYalVyR3lROUt0dUd2QTN0SUNMdG5YQ25QYWwrelpCT3FqTHBKQ0crcmNSSHUiLCJtYWMiOiIyODE5N2UyMTZjYTVkYTA3NDUxNTk5NTgxNGM4OGEyZDFhMGI2YmYxMjJjMzE3Y2Y2YWI2NGIzODI3OGI1MzZjIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlA1YkRYNmgxS25USTNRSnY0MFRHQmc9PSIsInZhbHVlIjoibVN6dGRxei9oVFg4MnZNUHVuRGxJQjk0SGxoejlOc2ZLT1JqRkd1SXFpa2o1MVZieG1RRG9RUWNuSjE4aE1WaUFTRUlrNTk5enFkWGNjWWZsS29NSFVZRDZGeTNNWS9Nb0hnc0lLbkVIL3BQclYxSFpkVjJBemxXL0tFajMzc04iLCJtYWMiOiJmZDI2NTcwMzNjN2E1MTA4MDk3ODFhODQ2NzFmM2M4MGEzNmMzMjA5NDVjMmUxNTM5OTFkMzI5ZmE5NDFiNGNlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css&quot;&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chart.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels&quot;&gt;&lt;/script&gt;

import ChartDataLabels from &#039;chartjs-plugin-datalabels&#039;;

&lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;script&gt;
    document.addEventListener(&#039;DOMContentLoaded&#039;, function() {
        const simplemde = new SimpleMDE({
            element: document.getElementById(&quot;description&quot;),

            // configure the toolbar
            toolbar: [
                &quot;bold&quot;, &quot;italic&quot;, &quot;heading&quot;, &quot;|&quot;
                , &quot;quote&quot;, &quot;unordered-list&quot;, &quot;ordered-list&quot;, &quot;|&quot;
                , &quot;link&quot;, &quot;image&quot;
            , ]
        , });
    });

&lt;/script&gt;

&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;

&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;ie=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;

    &lt;meta name=&quot;csrf-token&quot; content=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot;&gt;

    &lt;title&gt;Bandmate&lt;/title&gt;
    &lt;!-- Favicon --&gt;
    &lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;76x76&quot; href=&quot;https://www.bandmate.online/black/img/apple-icon.png&quot;&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;https://www.bandmate.online/black/img/favicon.png&quot;&gt;
    &lt;!-- Fonts --&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://use.fontawesome.com/releases/v5.0.6/css/all.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;link href=&quot;https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;!-- Icons --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/nucleo-icons.css&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;!-- CSS --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/black-dashboard.css?v=1.0.0&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/theme.css&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;/head&gt;

&lt;style&gt;
    body {
        background-image: url(&#039;https://www.bandmate.online/images/Background_sharp.jpg&#039;);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.85;
    }

&lt;/style&gt;

&lt;body class=&quot;gloif register-page&quot;&gt;

    
        &lt;nav class=&quot;navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
        &lt;div class=&quot;navbar-wrapper&quot;&gt;
            &lt;div class=&quot;navbar-toggle d-inline&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;navbar-toggler&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar1&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar2&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar3&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;
            &lt;/div&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;Register Page&lt;/a&gt;
        &lt;/div&gt;
        &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navigation&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navigation&quot;&gt;
            &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online&quot; class=&quot;nav-link text-primary&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-minimal-left&quot;&gt;&lt;/i&gt; &lt;span style=&quot;color: lightgray;&quot;&gt;Back to Welcome Page&lt;/span&gt;
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/register&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-laptop&quot;&gt;&lt;/i&gt; Register
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/login&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-single-02&quot;&gt;&lt;/i&gt; Login
                    &lt;/a&gt;
                &lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
    &lt;div class=&quot;wrapper wrapper-full-page&quot;&gt;
        &lt;div class=&quot;full-page register-page&quot;&gt;
            &lt;div class=&quot;content&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                        &lt;div class=&quot;row&quot;&gt;

        &lt;div class=&quot;col-md-7 mr-auto ml-auto&quot;&gt;
            &lt;div class=&quot;bm_card card&quot;&gt;
            &lt;div class=&quot;card-header&quot;&gt;
                &lt;h1 class=&quot;card-title&quot;&gt;Register&lt;/h1&gt;
            &lt;/div&gt;
            &lt;form class=&quot;form&quot; method=&quot;post&quot; action=&quot;https://www.bandmate.online/register&quot;&gt;
                &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot; autocomplete=&quot;off&quot;&gt;
                &lt;div class=&quot;card-body&quot;&gt;

                &lt;div class=&quot;input-group&quot;&gt;
                    &lt;div class=&quot;input-group-prepend&quot;&gt;
                    &lt;div class=&quot;input-group-text&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-single-02&quot;&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;input type=&quot;text&quot; name=&quot;name&quot; style=&quot;border: solid 1px; background: white; color: black;&quot; class=&quot;form-control&quot; placeholder=&quot;Name&quot;&gt;
                                    &lt;/div&gt;

                &lt;div class=&quot;input-group&quot;&gt;
                    &lt;div class=&quot;input-group-prepend&quot;&gt;
                    &lt;div class=&quot;input-group-text&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-email-85&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;input type=&quot;email&quot; name=&quot;email&quot; style=&quot;border: solid 1px; background: white; color: black;&quot; class=&quot;form-control&quot; placeholder=&quot;Email&quot;&gt;
                                    &lt;/div&gt;

                &lt;div class=&quot;input-group&quot;&gt;
                    &lt;div class=&quot;input-group-prepend&quot;&gt;
                    &lt;div class=&quot;input-group-text&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-lock-circle&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;input type=&quot;password&quot; name=&quot;password&quot; style=&quot;border: solid 1px; background: white; color: black;&quot; class=&quot;form-control&quot; placeholder=&quot;Password&quot;&gt;
                                    &lt;/div&gt;
                &lt;div class=&quot;input-group&quot;&gt;
                    &lt;div class=&quot;input-group-prepend&quot;&gt;
                    &lt;div class=&quot;input-group-text&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-lock-circle&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;input type=&quot;password&quot; name=&quot;password_confirmation&quot; class=&quot;form-control&quot; placeholder=&quot;Confirm Password&quot;&gt;
                &lt;/div&gt;
                &lt;div class=&quot;form-check text-left&quot;&gt;
                    &lt;label class=&quot;form-check-label&quot;&gt;
                    &lt;input class=&quot;form-check-input&quot; type=&quot;checkbox&quot;&gt;
                    &lt;span class=&quot;form-check-sign&quot;&gt;&lt;/span&gt;
                    I agree to the
                    &lt;a href=&quot;#&quot;&gt;terms and conditions&lt;/a&gt;.
                    &lt;/label&gt;
                &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;card-footer&quot;&gt;
                &lt;button type=&quot;submit&quot; class=&quot;btn btn-info btn-round btn-lg&quot;&gt;Register and continue&lt;/button&gt;
                &lt;/div&gt;
            &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;footer style=&quot;opacity: 0.85;&quot; ; class=&quot;footer&quot;&gt;
    &lt;footer class=&quot;footer&quot;&gt;
        &lt;div class=&quot;container-fluid&quot;&gt;
            &lt;div class=&quot;copyright text-left&quot;&gt;
                &lt;b&gt;Version 1.0&lt;/b&gt;
            &lt;/div&gt;
            &lt;div class=&quot;copyright text-right&quot;&gt;
                &amp;copy; 2026 Copyright Rob Baartwijk
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/div&gt;
        &lt;script src=&quot;https://www.bandmate.online/black/js/core/jquery.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/popper.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/bootstrap.min.js&quot;&gt;&lt;/script&gt;
    &lt;!--  Google Maps Plugin    --&gt;
    &lt;!-- Place this tag in your head or just before your close body tag. --&gt;
    
    &lt;!-- Chart JS --&gt;
    
    &lt;!--  Notifications Plugin    --&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/plugins/bootstrap-notify.js&quot;&gt;&lt;/script&gt;

    &lt;script src=&quot;https://www.bandmate.online/black/js/black-dashboard.min.js?v=1.0.0&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/theme.js&quot;&gt;&lt;/script&gt;

    
    &lt;script&gt;
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $(&#039;.sidebar&#039;);
                $navbar = $(&#039;.navbar&#039;);
                $main_panel = $(&#039;.main-panel&#039;);

                $full_page = $(&#039;.full-page&#039;);

                $sidebar_responsive = $(&#039;body &gt; .navbar-collapse&#039;);
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $(&#039;.sidebar .sidebar-wrapper .nav li.active a p&#039;).html();

                $(&#039;.fixed-plugin a&#039;).click(function(event) {
                    if ($(this).hasClass(&#039;switch-trigger&#039;)) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $(&#039;.fixed-plugin .background-color span&#039;).click(function() {
                    $(this).siblings().removeClass(&#039;active&#039;);
                    $(this).addClass(&#039;active&#039;);

                    var new_color = $(this).data(&#039;color&#039;);

                    if ($sidebar.length != 0) {
                        $sidebar.attr(&#039;data&#039;, new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr(&#039;data&#039;, new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr(&#039;filter-color&#039;, new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr(&#039;data&#039;, new_color);
                    }
                });

                $(&#039;.switch-sidebar-mini input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $(&#039;body&#039;).removeClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini deactivated...&#039;);
                    } else {
                        $(&#039;body&#039;).addClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini activated...&#039;);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event(&#039;resize&#039;));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $(&#039;.switch-change-color input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).removeClass(&#039;white-content&#039;);
                        }, 900);
                        white_color = false;
                    } else {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).addClass(&#039;white-content&#039;);
                        }, 900);

                        white_color = true;
                    }
                });
            });
        });

    &lt;/script&gt;
    &lt;/body&gt;

&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETregister" data-method="GET"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETregister"
                    onclick="tryItOut('GETregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETregister"
                    onclick="cancelTryOut('GETregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTregister">Handle a registration request for the application.</h2>

<p>
</p>



<span id="example-requests-POSTregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTregister">
</span>
<span id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTregister" data-method="POST"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTregister"
                    onclick="tryItOut('POSTregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTregister"
                    onclick="cancelTryOut('POSTregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTuser-profile-information">Update the user&#039;s profile information.</h2>

<p>
</p>



<span id="example-requests-PUTuser-profile-information">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/user/profile-information" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/profile-information"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTuser-profile-information">
</span>
<span id="execution-results-PUTuser-profile-information" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTuser-profile-information"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser-profile-information"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTuser-profile-information" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser-profile-information">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTuser-profile-information" data-method="PUT"
      data-path="user/profile-information"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTuser-profile-information', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTuser-profile-information"
                    onclick="tryItOut('PUTuser-profile-information');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTuser-profile-information"
                    onclick="cancelTryOut('PUTuser-profile-information');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTuser-profile-information"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>user/profile-information</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTuser-profile-information"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTuser-profile-information"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTuser-password">Update the user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-PUTuser-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/user/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTuser-password">
</span>
<span id="execution-results-PUTuser-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTuser-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTuser-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTuser-password" data-method="PUT"
      data-path="user/password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTuser-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTuser-password"
                    onclick="tryItOut('PUTuser-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTuser-password"
                    onclick="cancelTryOut('PUTuser-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTuser-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>user/password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTuser-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTuser-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-confirm-password">Show the confirm password view.</h2>

<p>
</p>



<span id="example-requests-GETuser-confirm-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/confirm-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/confirm-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-confirm-password">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImkxcWlaSEtMNUdXZjhrRHZUem1XaGc9PSIsInZhbHVlIjoiZ2k3bkdmRUp3ekdPNGVOMUQya1ppOHVxS1phOVpDaVlGWkRYLzJKZ2Z2VUxmQkdBMldQSlpxYktJaXpCMlJSUzBnbTFvMFU1TU1vRFNsZVh4cVdoSXM5eG1MSElhbWFlRE8wRjZGdGpxU2RJalNoL1RzSnFXUDhXanlSbW5GWEkiLCJtYWMiOiI3ZjUwMDRkYWFjN2IzNDEwMjMzMTBjODE1NGNlMWIxNTQ3M2EwNzU5ZDM2NDA2MGMyNDYzMzg5OWY5NTVhMTkzIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Im90TUxJbDZBUDVaWXRHRENhMi9Uanc9PSIsInZhbHVlIjoiM04weTA5WDRIMXkvQzc0NEdUeGdUVFZZdlVRNDdnMHlCMldycE5aZ2lMbTVuWHEzYllXVGFrQzhXV2VEd1pCcldHOU9mNm5Wd3l5ZS9NVjdRcytJd0luWFM3cmtHbUZPM3cySTk1bW10L1c0U2pjQ2crK01oM1U1SFRHb0Y0L0MiLCJtYWMiOiJiMGUwNGQ2ZDAyMzc3ZTE3ZDhhODYwY2JlOTYyYmMzZWQzZjg2NjFhMTEzNTFkY2QxYTk0ZjliODc1NDFmZmI0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-confirm-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-confirm-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-confirm-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-confirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-confirm-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-confirm-password" data-method="GET"
      data-path="user/confirm-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-confirm-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-confirm-password"
                    onclick="tryItOut('GETuser-confirm-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-confirm-password"
                    onclick="cancelTryOut('GETuser-confirm-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-confirm-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/confirm-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-confirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-confirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-confirmed-password-status">Get the password confirmation status.</h2>

<p>
</p>



<span id="example-requests-GETuser-confirmed-password-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/confirmed-password-status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/confirmed-password-status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-confirmed-password-status">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjRqT2Q0N3pURDB1clVnaW9rWHl1WEE9PSIsInZhbHVlIjoiVDhGM1lRSEFRRVlMb2RJS2hkKzVEcnR1YjFrcjVBSEcyMDJHdnU1ZlBPSUtPYVRTaVN0YmNwcGNvNnc5MXNBa09nMk1PU1lPc0xQZFNuVjNwbzlyTUJyWENnN0pvUUx1YVVwMkZCYXlNN1BvZXAxSE9ZSjZKQWlyK3g2MlUzbTgiLCJtYWMiOiIxZjk4N2RmODUyYjI3ZTMyOGZmNTdhNjFhMTU3ZTg0M2NhODVmMWI1MTBiOTVhZjRlMDgzMzZjMWY3ZTY5MGNlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlpsWHpJV2trbUlLNUtjUjd4c3RyYnc9PSIsInZhbHVlIjoiZndLKzN0UGxkZW9QSlpCZGl4WkkreVlueUtBdWVvMEhWUjIySmlxTGc3Y1lCQUZzSWlnaVJnZ1RpclBmNXFaWTV2RVFXQjdlalo3Sk1qNWU4dmxPUmRhWkI1UE9uWExMckwyS3haY3NYaDlmVy9USmF4WVhiczI4cVNRUjBtNnQiLCJtYWMiOiIxMzZiMGRjYzdkYTY3NTdmYjg3MzI2NDZiZDlkZTlkOTk4NTQzY2JlMmRkNTZjMTQwMDliMjI4YjE0ZDdhMmM4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-confirmed-password-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-confirmed-password-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-confirmed-password-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-confirmed-password-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-confirmed-password-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-confirmed-password-status" data-method="GET"
      data-path="user/confirmed-password-status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-confirmed-password-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-confirmed-password-status"
                    onclick="tryItOut('GETuser-confirmed-password-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-confirmed-password-status"
                    onclick="cancelTryOut('GETuser-confirmed-password-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-confirmed-password-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/confirmed-password-status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-confirmed-password-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-confirmed-password-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTuser-confirm-password">Confirm the user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-POSTuser-confirm-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/user/confirm-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/confirm-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTuser-confirm-password">
</span>
<span id="execution-results-POSTuser-confirm-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTuser-confirm-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-confirm-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTuser-confirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-confirm-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTuser-confirm-password" data-method="POST"
      data-path="user/confirm-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTuser-confirm-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTuser-confirm-password"
                    onclick="tryItOut('POSTuser-confirm-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTuser-confirm-password"
                    onclick="cancelTryOut('POSTuser-confirm-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTuser-confirm-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>user/confirm-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTuser-confirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTuser-confirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETtwo-factor-challenge">Show the two factor authentication challenge view.</h2>

<p>
</p>



<span id="example-requests-GETtwo-factor-challenge">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/two-factor-challenge" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"architecto\",
    \"recovery_code\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/two-factor-challenge"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "architecto",
    "recovery_code": "architecto"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETtwo-factor-challenge">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
location: https://www.bandmate.online/login
content-type: text/html; charset=utf-8
set-cookie: XSRF-TOKEN=eyJpdiI6InhCSUFvR2VMY243eTNBOVZaQWwwYUE9PSIsInZhbHVlIjoiNWJmNFBpa3NiN1lrSXZUK3RwdUZjT0o4YWRaUDVEZHZXODhSaGlRWklLZVhkUFNJa1R5WlRDMU5pbmRqUHoxTFpsbHUvRHBLbGJZS3c5YnE5bWpORkNNZFlQVHFCR3V3R2FTT0hNbDk2UGhBSGpxa0xHM2pVTGtFSWc5c2lDb2oiLCJtYWMiOiJhNGQzYzkyNGEzOTUzNGFlOTJlMDRhOTBjMjZmYmNiZGNhOGU1MjFhNjFmNDM1Y2ZmNzNmYWQzN2ZjOGI1YzE4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjB2c1FvSEdkWktWelNsM1JoeGRmV3c9PSIsInZhbHVlIjoiVS96Z3JPQlpGNDFJSUdDYnd3V1RnaFlCNHVIak5HNTBJWmZqMDdNTXRNOURuWDZWZ3VLTndmMWJseURSd3QwbXpVSTdYdXlvam5hMDNoK2JGbWVDS0hlcDZNMEtHN3BOWG5FQkVoUFRjUXd2emdPa2M1cGd4cGZyeTE4SXAvT2MiLCJtYWMiOiIxMWQzZjAxMGJiYzFiMDBkYjIwZDc2MzcwNDVhZmNiNzE1YzY3Y2MxN2M0YjliYmI2NTNhZWY3ZmJkMGNkMzBjIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;UTF-8&quot; /&gt;
        &lt;meta http-equiv=&quot;refresh&quot; content=&quot;0;url=&#039;https://www.bandmate.online/login&#039;&quot; /&gt;

        &lt;title&gt;Redirecting to https://www.bandmate.online/login&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        Redirecting to &lt;a href=&quot;https://www.bandmate.online/login&quot;&gt;https://www.bandmate.online/login&lt;/a&gt;.
    &lt;/body&gt;
&lt;/html&gt;</code>
 </pre>
    </span>
<span id="execution-results-GETtwo-factor-challenge" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETtwo-factor-challenge"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETtwo-factor-challenge"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETtwo-factor-challenge" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtwo-factor-challenge">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETtwo-factor-challenge" data-method="GET"
      data-path="two-factor-challenge"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETtwo-factor-challenge', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETtwo-factor-challenge"
                    onclick="tryItOut('GETtwo-factor-challenge');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETtwo-factor-challenge"
                    onclick="cancelTryOut('GETtwo-factor-challenge');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETtwo-factor-challenge"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>two-factor-challenge</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETtwo-factor-challenge"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETtwo-factor-challenge"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="GETtwo-factor-challenge"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recovery_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recovery_code"                data-endpoint="GETtwo-factor-challenge"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTtwo-factor-challenge">Attempt to authenticate a new session using the two factor authentication code.</h2>

<p>
</p>



<span id="example-requests-POSTtwo-factor-challenge">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/two-factor-challenge" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"code\": \"architecto\",
    \"recovery_code\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/two-factor-challenge"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "architecto",
    "recovery_code": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTtwo-factor-challenge">
</span>
<span id="execution-results-POSTtwo-factor-challenge" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTtwo-factor-challenge"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTtwo-factor-challenge"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTtwo-factor-challenge" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTtwo-factor-challenge">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTtwo-factor-challenge" data-method="POST"
      data-path="two-factor-challenge"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTtwo-factor-challenge', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTtwo-factor-challenge"
                    onclick="tryItOut('POSTtwo-factor-challenge');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTtwo-factor-challenge"
                    onclick="cancelTryOut('POSTtwo-factor-challenge');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTtwo-factor-challenge"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>two-factor-challenge</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTtwo-factor-challenge"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTtwo-factor-challenge"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTtwo-factor-challenge"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>recovery_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="recovery_code"                data-endpoint="POSTtwo-factor-challenge"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTuser-two-factor-authentication">Enable two factor authentication for the user.</h2>

<p>
</p>



<span id="example-requests-POSTuser-two-factor-authentication">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/user/two-factor-authentication" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/two-factor-authentication"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTuser-two-factor-authentication">
</span>
<span id="execution-results-POSTuser-two-factor-authentication" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTuser-two-factor-authentication"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-two-factor-authentication"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTuser-two-factor-authentication" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-two-factor-authentication">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTuser-two-factor-authentication" data-method="POST"
      data-path="user/two-factor-authentication"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTuser-two-factor-authentication', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTuser-two-factor-authentication"
                    onclick="tryItOut('POSTuser-two-factor-authentication');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTuser-two-factor-authentication"
                    onclick="cancelTryOut('POSTuser-two-factor-authentication');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTuser-two-factor-authentication"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>user/two-factor-authentication</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTuser-two-factor-authentication"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTuser-two-factor-authentication"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTuser-confirmed-two-factor-authentication">Enable two factor authentication for the user.</h2>

<p>
</p>



<span id="example-requests-POSTuser-confirmed-two-factor-authentication">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/user/confirmed-two-factor-authentication" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/confirmed-two-factor-authentication"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTuser-confirmed-two-factor-authentication">
</span>
<span id="execution-results-POSTuser-confirmed-two-factor-authentication" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTuser-confirmed-two-factor-authentication"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-confirmed-two-factor-authentication"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTuser-confirmed-two-factor-authentication" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-confirmed-two-factor-authentication">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTuser-confirmed-two-factor-authentication" data-method="POST"
      data-path="user/confirmed-two-factor-authentication"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTuser-confirmed-two-factor-authentication', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTuser-confirmed-two-factor-authentication"
                    onclick="tryItOut('POSTuser-confirmed-two-factor-authentication');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTuser-confirmed-two-factor-authentication"
                    onclick="cancelTryOut('POSTuser-confirmed-two-factor-authentication');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTuser-confirmed-two-factor-authentication"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>user/confirmed-two-factor-authentication</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTuser-confirmed-two-factor-authentication"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTuser-confirmed-two-factor-authentication"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-DELETEuser-two-factor-authentication">Disable two factor authentication for the user.</h2>

<p>
</p>



<span id="example-requests-DELETEuser-two-factor-authentication">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/user/two-factor-authentication" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/two-factor-authentication"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEuser-two-factor-authentication">
</span>
<span id="execution-results-DELETEuser-two-factor-authentication" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEuser-two-factor-authentication"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser-two-factor-authentication"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEuser-two-factor-authentication" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser-two-factor-authentication">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEuser-two-factor-authentication" data-method="DELETE"
      data-path="user/two-factor-authentication"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEuser-two-factor-authentication', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEuser-two-factor-authentication"
                    onclick="tryItOut('DELETEuser-two-factor-authentication');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEuser-two-factor-authentication"
                    onclick="cancelTryOut('DELETEuser-two-factor-authentication');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEuser-two-factor-authentication"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>user/two-factor-authentication</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEuser-two-factor-authentication"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEuser-two-factor-authentication"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-two-factor-qr-code">Get the SVG element for the user&#039;s two factor authentication QR code.</h2>

<p>
</p>



<span id="example-requests-GETuser-two-factor-qr-code">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/two-factor-qr-code" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/two-factor-qr-code"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-two-factor-qr-code">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InkrRzdrWXRhUUhZeUtwTVlEdVM4Tnc9PSIsInZhbHVlIjoidmxIMkZIZTJLVUU4Y0poTFFYOE00dHY2Nk1tV1pqOHIzK0UvbWNxN3UxUkdVelB2NE9QYXJQeGI4S1BvNDNqR1Yrd2EybzlVREZvY1dReW8vZ0lkM2xWZzhNaGJNTC9vSzIxS1FtOFdCSmpRMEkrbGJIeUhFQmhwVEdVUzBWTWoiLCJtYWMiOiI4MmU3ZDVkMTA1MTQ4ZGEwNWFmNDY4NzllYWFjYmMzNDliMmYxOWY2NWFkYzlmNzE3YWIwMTY0YWExNzczMmRhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InBOTjAxZWM2ZmNTRHNLR0M4SmtRWFE9PSIsInZhbHVlIjoiYWdkdnpIT0toZlVha1FkOThHc1BtRkt2T0M3MHI0YmRTemdJUHhuUXI4cTFwb2syQzhhSTFIaUJJTnNyZ2hrakZEWmFCS0lnNlBmRGQ3VHltdmJqRHNOOTByV0ZaUEtqY3ozRFJ1Zk8vQmJyZm1hcEJ5WDlsd1RTSFdvNkVzdzMiLCJtYWMiOiIzZjZiNmVmZTZkYTBkMjQyNjIxMzE5MDQ2NTFjNzg4NGRmMDAzZjA2MjY1Yjc2YjdjZmY4MzEwMDE2ZmU5ZTk5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-two-factor-qr-code" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-two-factor-qr-code"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-two-factor-qr-code"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-two-factor-qr-code" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-two-factor-qr-code">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-two-factor-qr-code" data-method="GET"
      data-path="user/two-factor-qr-code"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-two-factor-qr-code', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-two-factor-qr-code"
                    onclick="tryItOut('GETuser-two-factor-qr-code');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-two-factor-qr-code"
                    onclick="cancelTryOut('GETuser-two-factor-qr-code');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-two-factor-qr-code"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/two-factor-qr-code</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-two-factor-qr-code"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-two-factor-qr-code"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-two-factor-secret-key">Get the current user&#039;s two factor authentication setup / secret key.</h2>

<p>
</p>



<span id="example-requests-GETuser-two-factor-secret-key">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/two-factor-secret-key" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/two-factor-secret-key"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-two-factor-secret-key">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkQ3eWQ3UTVnNjNybDNZc25RcG1zeGc9PSIsInZhbHVlIjoiYmdCQ1ZrYkROUERnQ1Mra3NBak9mbHhLTitkYlNLMkxPZmJCeC9VRlBWSVVsSzh1MDVmcWlSanl5SjQrdk1WS3NnL2hxYnNsQmFXVHZiaEs5SW96ZW9BWTV2UlM0Qy9jNGZodjJ6cnphVDZKQ1dYbEV1RW9jOW04dHdncklub2UiLCJtYWMiOiJiNWNkYjA4MmIxNTU2ZGQ4MTg0YzM0Yzk1NTMxN2EzZDQxYTA1ZWQxOGZjZjA0N2NkOGU4MTk2N2VhOTVlZDgxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IkMvSlNJb0c0RWZVc3NvYkxOR1hwUWc9PSIsInZhbHVlIjoiZGdpK3VWK2liZjlPVkhNQjduMU5MV1Y3QWxtNEg3ajlqRkZwM0FsUWQzd3hxb0xkQVFVZkVxREo0Tm5zVUtTQWFJQUdwTC85ZkVyRm9RaFFremVXQitSYmZzbEVLM1gyQkcxT3JRUWIydnYrQlBxWEtySjJsSWNUVHZlNTArZ0ciLCJtYWMiOiI2YWEzOGEzZTFkYjgwMGZjMmFhYWY4Mjc1NWYwZGIxNTkzOGZjZGIwMjIwMTI1MzYxMzk2MGU5MzdhMTUyYTRlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-two-factor-secret-key" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-two-factor-secret-key"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-two-factor-secret-key"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-two-factor-secret-key" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-two-factor-secret-key">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-two-factor-secret-key" data-method="GET"
      data-path="user/two-factor-secret-key"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-two-factor-secret-key', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-two-factor-secret-key"
                    onclick="tryItOut('GETuser-two-factor-secret-key');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-two-factor-secret-key"
                    onclick="cancelTryOut('GETuser-two-factor-secret-key');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-two-factor-secret-key"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/two-factor-secret-key</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-two-factor-secret-key"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-two-factor-secret-key"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-two-factor-recovery-codes">Get the two factor authentication recovery codes for authenticated user.</h2>

<p>
</p>



<span id="example-requests-GETuser-two-factor-recovery-codes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/two-factor-recovery-codes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/two-factor-recovery-codes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-two-factor-recovery-codes">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InFtUi9SdnpsSkNUL2RhWlhmcXptWXc9PSIsInZhbHVlIjoiYy9DTlVjOFNwRTV0OCt5TlRETGt0N0FpR1hrYzNvZkkwWHV0VjVTUEdGUTZtYkw1SEJEdnhtc083OTVKTkZJd09laFZvWGNBV3hlMFhyM2dHMUVMRkJZNk01aWhmQzNsWlFvNVZocXVHNnBWbG55ZnVUczFzZHppRitLRnhYWXEiLCJtYWMiOiJmNTIwNjcyMjIwNTViOWM3NjkyMzM2ODEwMGI2NWVhNmQyYzg0YjYzZTlhMWU3M2ZlMTI4NmNhMTNlY2EzZDkxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IkViY1FBelFjVFdEMmlhL0w3b3FBSnc9PSIsInZhbHVlIjoib2FUWE9BOWNib2taT2ROWnAzSGExWGlzOFJBOXFTQVdjTlZodWVZK0VwMWtPWGZyY2xUQkFlWUxRMjBDNkt1MjVYQm13VlU1M2ZQUTBvSDM1ek5EVTNLR0wxenNieHQ4cFRLRWcvc0lyK2dvNVBndnVHTzcyYlpFMUM4TElTQ1AiLCJtYWMiOiI2MmU0OTM2NmM0NTFiYTBiNGQ4YzcxYmRiZTZkYmVkM2YzMjc4M2ExMWE2MWM5MTFiYmRjNTYzYThmODNiMjgxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-two-factor-recovery-codes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-two-factor-recovery-codes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-two-factor-recovery-codes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-two-factor-recovery-codes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-two-factor-recovery-codes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-two-factor-recovery-codes" data-method="GET"
      data-path="user/two-factor-recovery-codes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-two-factor-recovery-codes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-two-factor-recovery-codes"
                    onclick="tryItOut('GETuser-two-factor-recovery-codes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-two-factor-recovery-codes"
                    onclick="cancelTryOut('GETuser-two-factor-recovery-codes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-two-factor-recovery-codes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/two-factor-recovery-codes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-two-factor-recovery-codes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-two-factor-recovery-codes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTuser-two-factor-recovery-codes">Generate a fresh set of two factor authentication recovery codes.</h2>

<p>
</p>



<span id="example-requests-POSTuser-two-factor-recovery-codes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/user/two-factor-recovery-codes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/two-factor-recovery-codes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTuser-two-factor-recovery-codes">
</span>
<span id="execution-results-POSTuser-two-factor-recovery-codes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTuser-two-factor-recovery-codes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-two-factor-recovery-codes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTuser-two-factor-recovery-codes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-two-factor-recovery-codes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTuser-two-factor-recovery-codes" data-method="POST"
      data-path="user/two-factor-recovery-codes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTuser-two-factor-recovery-codes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTuser-two-factor-recovery-codes"
                    onclick="tryItOut('POSTuser-two-factor-recovery-codes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTuser-two-factor-recovery-codes"
                    onclick="cancelTryOut('POSTuser-two-factor-recovery-codes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTuser-two-factor-recovery-codes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>user/two-factor-recovery-codes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTuser-two-factor-recovery-codes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTuser-two-factor-recovery-codes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-profile">Show the user profile screen.</h2>

<p>
</p>



<span id="example-requests-GETuser-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-profile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IllKbks1QWJnWE1QWGdaTHo5VjdvVXc9PSIsInZhbHVlIjoicXBjN0ZIOXFTMm5VdHA0UU10VGEvTVpSTWN0OGZsK0NvS1NhYnl0NllkUy9weU50VFQwYWcxZjlDV0lZWkF0NFlZb1hEbHRncy82WXZMbUR0OGlWc3RPLy9zWGtFYW1lTzJNdCt1Qis0MStBT1p6WDF3UlBGSk5YZWVKdzhJaUIiLCJtYWMiOiJlNGZjZDg4YzU4N2RlZTg1YTQ2YmM5NDc4MGRkNjUyMGJkZjI5NmE2NmI0MGYyMTNkZDQ4ODc2NDA5MTdmNmIwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImhoaGJmdjNFajgzKzFpZWZ6N1RLRWc9PSIsInZhbHVlIjoiVU4xS2xVdE9Rd0djN3RxbXBaY3FWUVQyUU5Pb3FadENhSlpPK0MwNlRmMDhZWkpudVVXclVwaEJ1MG1WWTAzUmdoTHB4QTFFRkpZdHZoK2VJdXZMbEVJZHNBQ0hhais0YW5VNmM3R2dyemMvOXJXMFVxOEJOZmpMWTd1TDMrOEQiLCJtYWMiOiI2MDYzNDRiZDE0Zjc3MTVjYjAxNjUwMjFlNmVmNmQ3Njk0YzMxYTI2NGU4M2NmY2ZkYWRlMDcwMmNjYTEyYzNiIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-profile" data-method="GET"
      data-path="user/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-profile"
                    onclick="tryItOut('GETuser-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-profile"
                    onclick="cancelTryOut('GETuser-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-api-tokens">Show the user API token screen.</h2>

<p>
</p>



<span id="example-requests-GETuser-api-tokens">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/api-tokens" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/api-tokens"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-api-tokens">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkpxWnkwWmkvQjdqODYwOTZoRW9MNUE9PSIsInZhbHVlIjoiK3dPRWF3a3plNkNFdEFjcHcvWGxIL0JyZEtiRFU4T0pzSXFqci9Pb0U1UEFlNmdFV3ZvYUx0VXFuK29KTVRkTUpKbUszSVlzZXUwUmpmeTF5czNsb1A4SjJMUEpBNGhIM3lQOFVkT0huU2xab0g1TEZxYXFBbEhucG5VbzFhWHEiLCJtYWMiOiJiMjc5MjQyNWE4YzM0YWQ1OGQ2ZWI3ZDcxOTcxODdiYmYyNzU3YTM4MzVhMzlkN2UyMDRiZWM2MGIzZGMzMTg2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IitBcEpBQ3lyNWtNZ2RMNXR0cVpEZUE9PSIsInZhbHVlIjoielJVSmhLNjZoNmh3eDhKNnhwaXpQeVgyMzNkUDQwTjdqdXRwb25naXNmS3NiNXdXRWVmT1RmTEdPQmRaeExyTmNiQld3VVFielpKZHhmK1pOejlIaVlETjJaSFVRQmJXVlFWbUg5SWpSOVN0V2o5cnI2aWxadUQvM1dkdi9LTkMiLCJtYWMiOiIyNzJhNTcyNzgwYzU4NzFiYWY4ZjI3NmUyZDEyNzRhYzI3N2I4Mzg4MDBjYmQyMjUwMTI4MDExNmNjN2I5OGE0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-api-tokens" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-api-tokens"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-api-tokens"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-api-tokens" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-api-tokens">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-api-tokens" data-method="GET"
      data-path="user/api-tokens"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-api-tokens', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-api-tokens"
                    onclick="tryItOut('GETuser-api-tokens');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-api-tokens"
                    onclick="cancelTryOut('GETuser-api-tokens');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-api-tokens"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/api-tokens</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-api-tokens"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-api-tokens"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>

<p>
</p>



<span id="example-requests-GETsanctum-csrf-cookie">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/sanctum/csrf-cookie" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/sanctum/csrf-cookie"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsanctum-csrf-cookie">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IlpnMEhnTzd4VW1hZk9CVWdxdExucmc9PSIsInZhbHVlIjoiNWU0L3EzUWxhVTVscTNJWTg5bGlaVUp0RVhUbmJhMW1YUjAwQlNBNGI2NHg0dWVLUllvb28xczhOWHdWZ2g3TG10Zkh4QVUxR2J4anliT3Q1Vis5MEdMOVdLSGJsQTFSWVZrUjQ1dFV2TlhFSUdIUTlHTXlCOStXZkRlTlhHSE8iLCJtYWMiOiIyNWY0NTE4OTkwMWIzM2E0OWY0NTdlYTQ5Nzc3YWJlMjI3NzU1MDQ3NDIxNWMwNDBlNTY2NTY2NmFlZTQ0M2M5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ii8xa2ZpWUtaSVVmY1NxdFEyRy9YT2c9PSIsInZhbHVlIjoiSDF5d2xrV2M2WWFFajVDMHhidlhoK0Jlby93aW4zdURyTXB5L0g2SGd3aEl6WDA2VXpJamh3ZXU2ay91WnpvWE5salFTRHA5OG9WbHB1aytEejcxdy9HbDJGUmVHQlU5OTZyY3ZTZkNINSs4cTZmQmZiWXNKcitsUFUydkl1cTUiLCJtYWMiOiI0NjIzZjhlMjk2N2I2YjYwOWFmYzIxY2M0MDc0NGJjZTRkOGZmMDMxNTAxNGMwZGE5NjFlNzAwZDliZGU4NTRlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>
<code>Empty response</code>
 </pre>
    </span>
<span id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsanctum-csrf-cookie"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsanctum-csrf-cookie" data-method="GET"
      data-path="sanctum/csrf-cookie"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsanctum-csrf-cookie"
                    onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsanctum-csrf-cookie"
                    onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsanctum-csrf-cookie"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>sanctum/csrf-cookie</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsanctum-csrf-cookie"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsanctum-csrf-cookie"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETlivewire-livewire-js">GET livewire/livewire.js</h2>

<p>
</p>



<span id="example-requests-GETlivewire-livewire-js">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/livewire/livewire.js" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/livewire/livewire.js"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlivewire-livewire-js">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/javascript; charset=utf-8
expires: Wed, 27 Jan 2027 19:53:34 GMT
cache-control: max-age=31536000, public
accept-ranges: bytes
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;"></code>
 </pre>
    </span>
<span id="execution-results-GETlivewire-livewire-js" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlivewire-livewire-js"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlivewire-livewire-js"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlivewire-livewire-js" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlivewire-livewire-js">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlivewire-livewire-js" data-method="GET"
      data-path="livewire/livewire.js"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlivewire-livewire-js', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlivewire-livewire-js"
                    onclick="tryItOut('GETlivewire-livewire-js');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlivewire-livewire-js"
                    onclick="cancelTryOut('GETlivewire-livewire-js');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlivewire-livewire-js"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>livewire/livewire.js</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlivewire-livewire-js"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlivewire-livewire-js"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETlivewire-livewire-min-js-map">GET livewire/livewire.min.js.map</h2>

<p>
</p>



<span id="example-requests-GETlivewire-livewire-min-js-map">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/livewire/livewire.min.js.map" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/livewire/livewire.min.js.map"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlivewire-livewire-min-js-map">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/javascript; charset=utf-8
expires: Wed, 27 Jan 2027 19:53:34 GMT
cache-control: max-age=31536000, public
accept-ranges: bytes
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;"></code>
 </pre>
    </span>
<span id="execution-results-GETlivewire-livewire-min-js-map" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlivewire-livewire-min-js-map"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlivewire-livewire-min-js-map"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlivewire-livewire-min-js-map" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlivewire-livewire-min-js-map">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlivewire-livewire-min-js-map" data-method="GET"
      data-path="livewire/livewire.min.js.map"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlivewire-livewire-min-js-map', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlivewire-livewire-min-js-map"
                    onclick="tryItOut('GETlivewire-livewire-min-js-map');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlivewire-livewire-min-js-map"
                    onclick="cancelTryOut('GETlivewire-livewire-min-js-map');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlivewire-livewire-min-js-map"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>livewire/livewire.min.js.map</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlivewire-livewire-min-js-map"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlivewire-livewire-min-js-map"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlivewire-upload-file">POST livewire/upload-file</h2>

<p>
</p>



<span id="example-requests-POSTlivewire-upload-file">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/livewire/upload-file" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/livewire/upload-file"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlivewire-upload-file">
</span>
<span id="execution-results-POSTlivewire-upload-file" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlivewire-upload-file"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlivewire-upload-file"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlivewire-upload-file" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlivewire-upload-file">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlivewire-upload-file" data-method="POST"
      data-path="livewire/upload-file"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlivewire-upload-file', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlivewire-upload-file"
                    onclick="tryItOut('POSTlivewire-upload-file');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlivewire-upload-file"
                    onclick="cancelTryOut('POSTlivewire-upload-file');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlivewire-upload-file"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>livewire/upload-file</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlivewire-upload-file"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlivewire-upload-file"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETlivewire-preview-file--filename-">GET livewire/preview-file/{filename}</h2>

<p>
</p>



<span id="example-requests-GETlivewire-preview-file--filename-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/livewire/preview-file/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/livewire/preview-file/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlivewire-preview-file--filename-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlB2aG8zanMwUkFlYS9KcEFiUm5LR3c9PSIsInZhbHVlIjoiaDFVelZFZlRLN1J5a0tiVzdJdFlFeDRaY2E2eTFlbEpqeFJ4Vm1IWXp5dG1rUHpwcW93N2w3QmZwL24yeWUwQ3dMbHRQZHRNUFRZYnM0cTQzZG1mSzhQVWhEb1lXVFdSbWh3dDdTRVVHcGdCeWJZUXgvQ0FlUmJoNG1tM3M5a2oiLCJtYWMiOiIwMjgzMDljNTRjMDMxNzhhMTdjMzkzOTNjYmFjY2FlOTFjY2FlMGUyMDI5Mzk0NjgyOGYyZTkyNzM0OTkzODcxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlhDR1NrR0k0ZTF0VWFGZnN3akdxOUE9PSIsInZhbHVlIjoiV3RyTHFxZW5MSTdtMnMrTnVxQU9Sb0xaNHFrbGZ4RG5PdTRNT3R5NEtSSUlOWnVtdnJicmgyZktjQ2ZydFpONTlnN2MyKzdKWTMrV05qdmgzWWxSOGxvc2pvS1ZkTXlhNExFS3hnSVd5ZFZ6T2FyQk5KVUZPRlR5ZzhyV3E3c0siLCJtYWMiOiI1YjExMjlmMDQyODI1MGIzODg1MTBkMDllNWIwNjBmMDNhOTIwMmU1ZTU1YjI0M2JiOTY3Mzk1M2IyNWU3YjY1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETlivewire-preview-file--filename-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlivewire-preview-file--filename-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlivewire-preview-file--filename-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlivewire-preview-file--filename-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlivewire-preview-file--filename-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlivewire-preview-file--filename-" data-method="GET"
      data-path="livewire/preview-file/{filename}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlivewire-preview-file--filename-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlivewire-preview-file--filename-"
                    onclick="tryItOut('GETlivewire-preview-file--filename-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlivewire-preview-file--filename-"
                    onclick="cancelTryOut('GETlivewire-preview-file--filename-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlivewire-preview-file--filename-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>livewire/preview-file/{filename}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlivewire-preview-file--filename-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlivewire-preview-file--filename-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>filename</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="filename"                data-endpoint="GETlivewire-preview-file--filename-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETup">GET up</h2>

<p>
</p>



<span id="example-requests-GETup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/up" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/up"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETup">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;title&gt;Bandmate&lt;/title&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
    &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;!-- Styles --&gt;
    &lt;script src=&quot;https://cdn.tailwindcss.com&quot;&gt;&lt;/script&gt;

    &lt;script&gt;
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: [&#039;Figtree&#039;, &#039;ui-sans-serif&#039;, &#039;system-ui&#039;, &#039;sans-serif&#039;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;],
                    }
                }
            }
        }
    &lt;/script&gt;
&lt;/head&gt;
&lt;body class=&quot;antialiased&quot;&gt;
&lt;div class=&quot;relative flex justify-center items-center min-h-screen bg-gray-100 selection:bg-red-500 selection:text-white&quot;&gt;
    &lt;div class=&quot;w-full sm:w-3/4 xl:w-1/2 mx-auto p-6&quot;&gt;
        &lt;div class=&quot;px-6 py-4 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex items-center focus:outline focus:outline-2 focus:outline-red-500&quot;&gt;
            &lt;div class=&quot;relative flex h-3 w-3 group &quot;&gt;
                &lt;span class=&quot;animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 group-[.status-down]:bg-red-600 opacity-75&quot;&gt;&lt;/span&gt;
                &lt;span class=&quot;relative inline-flex rounded-full h-3 w-3 bg-green-400 group-[.status-down]:bg-red-600&quot;&gt;&lt;/span&gt;
            &lt;/div&gt;

            &lt;div class=&quot;ml-6&quot;&gt;
                &lt;h2 class=&quot;text-xl font-semibold text-gray-900&quot;&gt;Application up&lt;/h2&gt;

                &lt;p class=&quot;mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed&quot;&gt;
                    HTTP request received.

                                            Response rendered in 661ms.
                                    &lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETup"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETup">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETup" data-method="GET"
      data-path="up"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETup"
                    onclick="tryItOut('GETup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETup"
                    onclick="cancelTryOut('GETup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETup"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>up</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETup"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETup"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GET-">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GET-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=utf-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IndQaG5qZVVvQ0ZNSkQzVEg2SkxBZGc9PSIsInZhbHVlIjoibmZER1B4QWVYbnlpelJ5elYydDRSaE5ET21WTlpPbTkvc0hOcytiSytFK0x3aDFoUVdQVGt4RW9yeC83NElsWmE1UEp6SHJCeVpCM28vRFp0c05FcUhrdGhKa1RBRU9CWEFIa0FkMUZSbmdJWUVLV1lyamtjOUdtRzV2bnFhMjkiLCJtYWMiOiI1OTlkZTc1Y2EyYTA5ZTRlMmY1YmNmNGNiNzczMWY1YjMxYWNiM2QzZmU4OWNlMTNlNzQ5YzgxNzFlNTExYjg5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ik1RaUExanpsZy9NSkdvVXdjbzVZWmc9PSIsInZhbHVlIjoiQ0Vvb0xzR0dENzdlc0tjcDRHVGcxOHQ3M0RHRU82TzVMNVp3MXFONTBreENpdXR5RFMxMzdwUzJqbXlZaHZNUStaU3lMajBiOWlIcmtUTnk4a1MxTEZsZlp4UFQ3aXNUckFiS2VkOWQ5WHVxaVQ2cTE2Q1NtbHlVTkFISHM5azkiLCJtYWMiOiJmNjY0NjgwZGIzMWRjZGM5MmRkMWVlOTg1ZWVmZmQyMTI4YzFiYWZmN2ZjZTVjODlmY2VkYzkyODhiNDE1MmI4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css&quot;&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chart.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels&quot;&gt;&lt;/script&gt;

import ChartDataLabels from &#039;chartjs-plugin-datalabels&#039;;

&lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;script&gt;
    document.addEventListener(&#039;DOMContentLoaded&#039;, function() {
        const simplemde = new SimpleMDE({
            element: document.getElementById(&quot;description&quot;),

            // configure the toolbar
            toolbar: [
                &quot;bold&quot;, &quot;italic&quot;, &quot;heading&quot;, &quot;|&quot;
                , &quot;quote&quot;, &quot;unordered-list&quot;, &quot;ordered-list&quot;, &quot;|&quot;
                , &quot;link&quot;, &quot;image&quot;
            , ]
        , });
    });

&lt;/script&gt;

&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;

&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;ie=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;

    &lt;meta name=&quot;csrf-token&quot; content=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot;&gt;

    &lt;title&gt;Bandmate&lt;/title&gt;
    &lt;!-- Favicon --&gt;
    &lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;76x76&quot; href=&quot;https://www.bandmate.online/black/img/apple-icon.png&quot;&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;https://www.bandmate.online/black/img/favicon.png&quot;&gt;
    &lt;!-- Fonts --&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://use.fontawesome.com/releases/v5.0.6/css/all.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;link href=&quot;https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;!-- Icons --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/nucleo-icons.css&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;!-- CSS --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/black-dashboard.css?v=1.0.0&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/theme.css&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;/head&gt;

&lt;style&gt;
    body {
        background-image: url(&#039;https://www.bandmate.online/images/Background_sharp.jpg&#039;);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.85;
    }

&lt;/style&gt;

&lt;body class=&quot;gloif &quot;&gt;

    
        &lt;nav class=&quot;navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
        &lt;div class=&quot;navbar-wrapper&quot;&gt;
            &lt;div class=&quot;navbar-toggle d-inline&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;navbar-toggler&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar1&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar2&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar3&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;
            &lt;/div&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;&lt;/a&gt;
        &lt;/div&gt;
        &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navigation&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navigation&quot;&gt;
            &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online&quot; class=&quot;nav-link text-primary&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-minimal-left&quot;&gt;&lt;/i&gt; &lt;span style=&quot;color: lightgray;&quot;&gt;Back to Welcome Page&lt;/span&gt;
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/register&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-laptop&quot;&gt;&lt;/i&gt; Register
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/login&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-single-02&quot;&gt;&lt;/i&gt; Login
                    &lt;/a&gt;
                &lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
    &lt;div class=&quot;wrapper wrapper-full-page&quot;&gt;
        &lt;div class=&quot;full-page &quot;&gt;
            &lt;div class=&quot;content&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                    
&lt;div class=&quot;header py-7 py-lg-8&quot;&gt;
    &lt;div class=&quot;container&quot;&gt;
        &lt;div class=&quot;header-body text-center mb-7&quot;&gt;
            &lt;div class=&quot;row justify-content-center&quot; style=&quot;margin-top: 10px;&quot;&gt;
                &lt;div class=&quot;col-lg-8 col-md-6&quot;&gt;
                    &lt;p class=&quot;text-lead text-light&quot; style=&quot;border: solid 1px; border-color: rgb(190, 190, 208);&quot;&gt;
                        &lt;img src=&quot;https://www.bandmate.online/images/Logo2.jpg&quot; /&gt;
                    &lt;/p&gt;
                    &lt;br&gt;
                    &lt;h1 class=&quot;text-white&quot;&gt;Welcome to Bandmate&lt;/h1&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        

        


        &lt;p&gt;
            &lt;h4 class=&quot;text-white&quot;&gt;
                The best place to find your bandmates, rehearsal rooms, agencies and venues. You can use the options in the menu on the left to browse through all the available information and add your own information. You will then be able to edit the information you have entered yourself, but only browse through other users&#039; information.
            &lt;/h4&gt;
        &lt;/p&gt;

        &lt;p&gt;
            &lt;h4 class=&quot;text-white&quot;&gt;
                This website is a labour of love and it is not sponsored by anyone. Your data is necessary for you to log in and for other musicians to find you, but the information will never be shared with any other person or organisation.
                The site is meant for musicians, NOT for the music business.
            &lt;/h4&gt;
        &lt;/p&gt;

        &lt;p&gt;
            &lt;h4 class=&quot;text-white&quot;&gt;
                If you wish to support me in paying the hosting cost of this site you can donate via Paypal by clicking on the icon below.
            &lt;/h4&gt;
        &lt;/p&gt;

        &lt;div style=&quot;margin-top:50px; margin-bottom:50px; text-align: center;&quot;&gt;
            &lt;form action=&quot;https://www.paypal.com/donate&quot; method=&quot;post&quot; target=&quot;_top&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;business&quot; value=&quot;48VGHAS7GVRPW&quot; /&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;no_recurring&quot; value=&quot;0&quot; /&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;item_name&quot; value=&quot;These donations help keep the website onine, you help yourself and your colleagues by supporting us. Thank you!&quot; /&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;currency_code&quot; value=&quot;EUR&quot; /&gt;
            &lt;input type=&quot;image&quot; src=&quot;https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif&quot; border=&quot;0&quot; name=&quot;submit&quot; title=&quot;PayPal - The safer, easier way to pay online!&quot; alt=&quot;Donate with PayPal button&quot; /&gt;
            &lt;img alt=&quot;&quot; border=&quot;0&quot; src=&quot;https://www.paypal.com/en_N&quot;&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;div class=&quot;row&quot;&gt;
    &lt;div class=&quot;col-md-12&quot;&gt;
        &lt;div class=&quot;bm_card card&quot;&gt;
            &lt;div class=&quot;card-header&quot;&gt;
                &lt;h3 class=&quot;card-title&quot;&gt;&lt;b&gt;Recently added&lt;/b&gt;&lt;/h3&gt;
            &lt;/div&gt;

            &lt;header&gt;
                &lt;h4 style=&quot;margin-top: 40px; margin-left: 20px;&quot;&gt;&lt;b&gt;Acts&lt;/b&gt;&lt;/h4&gt;
            &lt;/header&gt;

            &lt;div style=&quot;margin-left: 20px;&quot; class=&quot;table-responsive&quot;&gt;
                &lt;table class=&quot;table tablesorter&quot; id=&quot;&quot;&gt;
                    &lt;thead class=&quot; text-primary&quot;&gt;
                        &lt;tr&gt;
                            &lt;th&gt;Name&lt;/th&gt;
                            &lt;th&gt;Genre&lt;/th&gt;
                            &lt;th&gt;Band members&lt;/th&gt;
                            &lt;th&gt;Description&lt;/th&gt;
                            &lt;th&gt;Date added&lt;/th&gt;
                        &lt;/tr&gt;
                    &lt;/thead&gt;
                    &lt;tbody&gt;
                                                                        &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/542&quot;&gt;Solid Air&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Drum and Bass&lt;/td&gt;
                            &lt;td&gt;3&lt;/td&gt;
                            &lt;td&gt;Lorem ipsum odor amet, consectetuer adipi...&lt;/td&gt;
                            &lt;td&gt;2025-01-12 12:56:16&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/463&quot;&gt;Ms. Nyasia Koss V&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;House&lt;/td&gt;
                            &lt;td&gt;7&lt;/td&gt;
                            &lt;td&gt;Qui atque aut quis est sed asperiores. Vo...&lt;/td&gt;
                            &lt;td&gt;2025-01-02 21:43:47&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/72&quot;&gt;Davonte Champlin&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Delta Blues&lt;/td&gt;
                            &lt;td&gt;3&lt;/td&gt;
                            &lt;td&gt;Voluptatem possimus pariatur ea quia est...&lt;/td&gt;
                            &lt;td&gt;2025-01-01 23:48:11&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/79&quot;&gt;Jordon Kiehn&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Western Swing&lt;/td&gt;
                            &lt;td&gt;1&lt;/td&gt;
                            &lt;td&gt;Magni et odio autem voluptatem inventore....&lt;/td&gt;
                            &lt;td&gt;2025-01-01 17:59:53&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/364&quot;&gt;Mrs. Ettie Haag&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Heavy Metal&lt;/td&gt;
                            &lt;td&gt;10&lt;/td&gt;
                            &lt;td&gt;Voluptas commodi alias doloremque accusam...&lt;/td&gt;
                            &lt;td&gt;2025-01-01 08:41:28&lt;/td&gt;
                        &lt;/tr&gt;
                                                                    &lt;/tbody&gt;
                &lt;/table&gt;
            &lt;/div&gt;

            &lt;header&gt;
                &lt;h4 style=&quot;margin-top: 40px; margin-left: 20px;&quot;&gt;&lt;b&gt;Vacancies&lt;/b&gt;&lt;/h4&gt;
            &lt;/header&gt;

            &lt;div style=&quot;margin-left: 20px;&quot; class=&quot;table-responsive&quot;&gt;
                &lt;table class=&quot;table tablesorter&quot; id=&quot;&quot;&gt;
                    &lt;thead class=&quot; text-primary&quot;&gt;
                        &lt;tr&gt;
                            &lt;th&gt;Act&lt;/th&gt;
                            &lt;th&gt;Genre&lt;/th&gt;
                            &lt;th&gt;Instrument&lt;/th&gt;
                            &lt;th&gt;Description&lt;/th&gt;
                            &lt;th&gt;Date added&lt;/th&gt;
                        &lt;/tr&gt;
                    &lt;/thead&gt;
                    &lt;tbody&gt;
                                                                        &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/364&quot;&gt;Mrs. Ettie Haag&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Synth Pop&lt;/td&gt;
                            &lt;td&gt;Vocals&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/vacancies/2115&quot;&gt;Quod optio modi quaerat unde qui voluptati...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 21:16:41&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/364&quot;&gt;Mrs. Ettie Haag&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Electronic&lt;/td&gt;
                            &lt;td&gt;Growling&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/vacancies/2068&quot;&gt;Quis velit repudiandae reprehenderit magna...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 21:16:41&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/364&quot;&gt;Mrs. Ettie Haag&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Baroque&lt;/td&gt;
                            &lt;td&gt;Classical Guitar&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/vacancies/2066&quot;&gt;Enim architecto aliquam hic deserunt est a...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 21:16:41&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/364&quot;&gt;Mrs. Ettie Haag&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Techno&lt;/td&gt;
                            &lt;td&gt;Synthesizer&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/vacancies/2067&quot;&gt;Sunt dignissimos alias accusamus neque ist...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 21:16:41&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/acts/364&quot;&gt;Mrs. Ettie Haag&lt;/a&gt;&lt;/td&gt;
                            &lt;td&gt;Western Swing&lt;/td&gt;
                            &lt;td&gt;Clavinet&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/vacancies/2065&quot;&gt;Expedita nam ut ea eaque aut et placeat. C...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 21:16:41&lt;/td&gt;
                        &lt;/tr&gt;
                                                                    &lt;/tbody&gt;
                &lt;/table&gt;
            &lt;/div&gt;

            &lt;header&gt;
                &lt;h4 style=&quot;margin-top: 40px; margin-left: 20px;&quot;&gt;&lt;b&gt;Available musicians&lt;/b&gt;&lt;/h4&gt;
            &lt;/header&gt;

            &lt;div style=&quot;margin-left: 20px;&quot; class=&quot;table-responsive&quot;&gt;
                &lt;table class=&quot;table tablesorter&quot; id=&quot;&quot;&gt;
                    &lt;thead class=&quot; text-primary&quot;&gt;
                        &lt;tr&gt;
                            &lt;th&gt;Name&lt;/th&gt;
                            &lt;th&gt;Genre&lt;/th&gt;
                            &lt;th&gt;Instrument&lt;/th&gt;
                            &lt;th&gt;Description&lt;/th&gt;
                            &lt;th&gt;Date added&lt;/th&gt;
                        &lt;/tr&gt;
                    &lt;/thead&gt;
                    &lt;tbody&gt;
                                                                        &lt;tr&gt;
                            &lt;td&gt;Rob Baartwijk&lt;/td&gt;
                            &lt;td&gt;Progressive Rock&lt;/td&gt;
                            &lt;td&gt;Electric Guitar&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/availablemusicians/101&quot;&gt;Text&lt;/a&gt;
                            &lt;td&gt;2025-11-11 22:20:13&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Black User&lt;/td&gt;
                            &lt;td&gt;Progressive Rock&lt;/td&gt;
                            &lt;td&gt;Bass Guitar&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/availablemusicians/100&quot;&gt;sdgsdfg&lt;/a&gt;
                            &lt;td&gt;2025-02-20 11:48:07&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Rob Baartwijk&lt;/td&gt;
                            &lt;td&gt;Progressive Rock&lt;/td&gt;
                            &lt;td&gt;Electric Guitar&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/availablemusicians/99&quot;&gt;Lorem ipsum odor amet, consectetuer...&lt;/a&gt;
                            &lt;td&gt;2025-01-10 13:11:34&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Robbed&lt;/td&gt;
                            &lt;td&gt;Drum and Bass&lt;/td&gt;
                            &lt;td&gt;Acoustic Guitar&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/availablemusicians/26&quot;&gt;Me&lt;/a&gt;
                            &lt;td&gt;2025-01-07 16:27:40&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Duane Franecki&lt;/td&gt;
                            &lt;td&gt;Drum and Bass&lt;/td&gt;
                            &lt;td&gt;Timpani&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/availablemusicians/87&quot;&gt;Et quia enim aut sit. Qui voluptas...&lt;/a&gt;
                            &lt;td&gt;2024-12-01 19:43:06&lt;/td&gt;
                        &lt;/tr&gt;
                                                                    &lt;/tbody&gt;
                &lt;/table&gt;
            &lt;/div&gt;

            &lt;header&gt;
                &lt;h4 style=&quot;margin-top: 40px; margin-left: 20px;&quot;&gt;&lt;b&gt;Rehearsal rooms&lt;/b&gt;&lt;/h4&gt;
            &lt;/header&gt;

            &lt;div style=&quot;margin-left: 20px;&quot; class=&quot;table-responsive&quot;&gt;
                &lt;table class=&quot;table tablesorter&quot; id=&quot;&quot;&gt;
                    &lt;thead class=&quot; text-primary&quot;&gt;
                        &lt;tr&gt;
                            &lt;th&gt;Name&lt;/th&gt;
                            &lt;th&gt;City&lt;/th&gt;
                            &lt;th&gt;Country&lt;/th&gt;
                            &lt;th&gt;Description&lt;/th&gt;
                            &lt;th&gt;Date added&lt;/th&gt;
                        &lt;/tr&gt;
                    &lt;/thead&gt;
                    &lt;tbody&gt;
                                                                        &lt;tr&gt;
                            &lt;td&gt;testinggggg&lt;/td&gt;
                            &lt;td&gt;Leiden&lt;/td&gt;
                            &lt;td&gt;Netherlands&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/rehearsalrooms/6&quot;&gt;adfgsadfgasdf&lt;/a&gt;
                            &lt;td&gt;2025-02-20 11:55:32&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Jody Corwin&lt;/td&gt;
                            &lt;td&gt;Bashirianport&lt;/td&gt;
                            &lt;td&gt;Falkland Islands (Malvinas)&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/rehearsalrooms/1&quot;&gt;Perferendis corporis veritatis...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 12:56:54&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Ms. Dayana Farrell&lt;/td&gt;
                            &lt;td&gt;Vestastad&lt;/td&gt;
                            &lt;td&gt;Jamaica&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/rehearsalrooms/2&quot;&gt;Dolor voluptatem nihil volupta...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 12:56:54&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Dr. Ramon Bashirian&lt;/td&gt;
                            &lt;td&gt;Lamarfort&lt;/td&gt;
                            &lt;td&gt;Lithuania&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/rehearsalrooms/3&quot;&gt;Dicta iusto dolorem itaque pro...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 12:56:54&lt;/td&gt;
                        &lt;/tr&gt;
                                                &lt;tr&gt;
                            &lt;td&gt;Judson Harris V&lt;/td&gt;
                            &lt;td&gt;West Frederic&lt;/td&gt;
                            &lt;td&gt;Montenegro&lt;/td&gt;
                            &lt;td&gt;&lt;a href=&quot;https://www.bandmate.online/rehearsalrooms/4&quot;&gt;Qui iusto velit sapiente. Volu...&lt;/a&gt;
                            &lt;td&gt;2025-01-07 12:56:54&lt;/td&gt;
                        &lt;/tr&gt;
                                                                    &lt;/tbody&gt;
                &lt;/table&gt;
            &lt;/div&gt;







        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;











                &lt;/div&gt;
            &lt;/div&gt;
            &lt;footer style=&quot;opacity: 0.85;&quot; ; class=&quot;footer&quot;&gt;
    &lt;footer class=&quot;footer&quot;&gt;
        &lt;div class=&quot;container-fluid&quot;&gt;
            &lt;div class=&quot;copyright text-left&quot;&gt;
                &lt;b&gt;Version 1.0&lt;/b&gt;
            &lt;/div&gt;
            &lt;div class=&quot;copyright text-right&quot;&gt;
                &amp;copy; 2026 Copyright Rob Baartwijk
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/div&gt;
        &lt;script src=&quot;https://www.bandmate.online/black/js/core/jquery.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/popper.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/bootstrap.min.js&quot;&gt;&lt;/script&gt;
    &lt;!--  Google Maps Plugin    --&gt;
    &lt;!-- Place this tag in your head or just before your close body tag. --&gt;
    
    &lt;!-- Chart JS --&gt;
    
    &lt;!--  Notifications Plugin    --&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/plugins/bootstrap-notify.js&quot;&gt;&lt;/script&gt;

    &lt;script src=&quot;https://www.bandmate.online/black/js/black-dashboard.min.js?v=1.0.0&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/theme.js&quot;&gt;&lt;/script&gt;

    
    &lt;script&gt;
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $(&#039;.sidebar&#039;);
                $navbar = $(&#039;.navbar&#039;);
                $main_panel = $(&#039;.main-panel&#039;);

                $full_page = $(&#039;.full-page&#039;);

                $sidebar_responsive = $(&#039;body &gt; .navbar-collapse&#039;);
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $(&#039;.sidebar .sidebar-wrapper .nav li.active a p&#039;).html();

                $(&#039;.fixed-plugin a&#039;).click(function(event) {
                    if ($(this).hasClass(&#039;switch-trigger&#039;)) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $(&#039;.fixed-plugin .background-color span&#039;).click(function() {
                    $(this).siblings().removeClass(&#039;active&#039;);
                    $(this).addClass(&#039;active&#039;);

                    var new_color = $(this).data(&#039;color&#039;);

                    if ($sidebar.length != 0) {
                        $sidebar.attr(&#039;data&#039;, new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr(&#039;data&#039;, new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr(&#039;filter-color&#039;, new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr(&#039;data&#039;, new_color);
                    }
                });

                $(&#039;.switch-sidebar-mini input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $(&#039;body&#039;).removeClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini deactivated...&#039;);
                    } else {
                        $(&#039;body&#039;).addClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini activated...&#039;);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event(&#039;resize&#039;));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $(&#039;.switch-change-color input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).removeClass(&#039;white-content&#039;);
                        }, 900);
                        white_color = false;
                    } else {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).addClass(&#039;white-content&#039;);
                        }, 900);

                        white_color = true;
                    }
                });
            });
        });

    &lt;/script&gt;
    &lt;/body&gt;

&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GET-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET-" data-method="GET"
      data-path="/"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET-"
                    onclick="tryItOut('GET-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET-"
                    onclick="cancelTryOut('GET-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>/</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETdashboard">GET dashboard</h2>

<p>
</p>



<span id="example-requests-GETdashboard">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/dashboard" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/dashboard"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETdashboard">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Im1pT3B4MlJ2T281RVl2SGdDL1k0eUE9PSIsInZhbHVlIjoiWXdhUmU4eWVQek1lZUt6VUpPTDBmbm41T2xuT0FZTWNUTVIxUkhzczl1U3g4ZXdQT0FIQ1NzcElXT3pZNWFvYmJhN2pQN01MazNUM25kd0p2VDdwSisrL3BBSTJGQWZ3bGF4QjF6UjJJZnNxRUZ5ZDRzR25KLzU4WkorbE5lWC8iLCJtYWMiOiIzNTQ3ODRmZTYzMjU0NWFlNGUxYTNhMzcwYjY4ODU4MjEwMjc2OTU3MjE4NTVhNTczMWYzMDRjOTlkZWJjZWNmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlBxcUZqakNkVVJ3UThFaVluU2dpMUE9PSIsInZhbHVlIjoiOWw5MUxtOUJ1cC9jSDJLVzdVMXRqUmpSTFliOXRqcDFIOFBQZFZneEFXRlpMT3QwVVIzYUQwRG5RN1E3ZkkwZ3laNHkxV2syRUM2SlVuS21XRXZoUWhoOS9jK2s5c0pFU0V1WEl1UXZrd2FuUUs5bXJyeDRxQkZDOXc2V00vc3IiLCJtYWMiOiIzNjE0YTUzNjkwMWYxMDMwOTUwMGE2ODZmMTYzY2IzYjIzZDRmMWUzOWJhNDViMTI5ZDFlMDc3NGYzOTQ4NmEzIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETdashboard" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETdashboard"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETdashboard"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETdashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdashboard">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETdashboard" data-method="GET"
      data-path="dashboard"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETdashboard', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETdashboard"
                    onclick="tryItOut('GETdashboard');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETdashboard"
                    onclick="cancelTryOut('GETdashboard');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETdashboard"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>dashboard</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETdashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETdashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETpassword-reset">Display the form to request a password reset link.</h2>

<p>
</p>



<span id="example-requests-GETpassword-reset">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/password/reset" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/password/reset"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETpassword-reset">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=utf-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6Iis0ZzBFWEpRRy9yWHBSVEN2KzU4bHc9PSIsInZhbHVlIjoiTFFJOGhVWDZ5SFRwbkdyUFZ3UGlHMVRGOVljcTE4dHhiemtIK0xUQjQxZTJld21LTFBoR3FUUUt3SVlLMEtDTEFiQWJ6MGk1TWN5eUhTNWtTbU5DN1FCZnJTSWpiQ2EwVzVvck5ZT0RBWlpIaFpZbHRldGVHZUZCOTIzaHViZmUiLCJtYWMiOiI5NTJjNmJjM2ZlZjZhZmY5MDQyODdjM2RiMzA4NmZlZDg5MWMwMjM3OWM0MjRkNWMwOGNlMmZkZjRmMDUzNDhhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InhYWVNzNDgyWmhRVGd5Skgzd0sxY1E9PSIsInZhbHVlIjoibkZIekU5enhyRDlSdkFWempsM25NQVNRUVlaQmdaUVV4ZUE5bkJvSEc1b3FONUpVSGlCaG5LeHg1aVowQ0R4R2JPS0IrNEVIRzFnejFLMXNnUUFiWHk2clI3UXp4YTRvbkNNVjJ4QVRNY2hEamhrcFBZN3lKM0NPTnNLZmNhVU8iLCJtYWMiOiI5MDlhNWZlM2JiODhlODExNGVlYmVlMjQxMTVmYzUyMzc0OTFkNWMyMDY0YjFmNjcyMTRjNjcyNzRlMDAyMzE3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css&quot;&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chart.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels&quot;&gt;&lt;/script&gt;

import ChartDataLabels from &#039;chartjs-plugin-datalabels&#039;;

&lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;script&gt;
    document.addEventListener(&#039;DOMContentLoaded&#039;, function() {
        const simplemde = new SimpleMDE({
            element: document.getElementById(&quot;description&quot;),

            // configure the toolbar
            toolbar: [
                &quot;bold&quot;, &quot;italic&quot;, &quot;heading&quot;, &quot;|&quot;
                , &quot;quote&quot;, &quot;unordered-list&quot;, &quot;ordered-list&quot;, &quot;|&quot;
                , &quot;link&quot;, &quot;image&quot;
            , ]
        , });
    });

&lt;/script&gt;

&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;

&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;ie=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;

    &lt;meta name=&quot;csrf-token&quot; content=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot;&gt;

    &lt;title&gt;Bandmate&lt;/title&gt;
    &lt;!-- Favicon --&gt;
    &lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;76x76&quot; href=&quot;https://www.bandmate.online/black/img/apple-icon.png&quot;&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;https://www.bandmate.online/black/img/favicon.png&quot;&gt;
    &lt;!-- Fonts --&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://use.fontawesome.com/releases/v5.0.6/css/all.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;link href=&quot;https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;!-- Icons --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/nucleo-icons.css&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;!-- CSS --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/black-dashboard.css?v=1.0.0&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/theme.css&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;/head&gt;

&lt;style&gt;
    body {
        background-image: url(&#039;https://www.bandmate.online/images/Background_sharp.jpg&#039;);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.85;
    }

&lt;/style&gt;

&lt;body class=&quot;gloif login-page&quot;&gt;

    
        &lt;nav class=&quot;navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
        &lt;div class=&quot;navbar-wrapper&quot;&gt;
            &lt;div class=&quot;navbar-toggle d-inline&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;navbar-toggler&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar1&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar2&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar3&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;
            &lt;/div&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;Reset password&lt;/a&gt;
        &lt;/div&gt;
        &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navigation&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navigation&quot;&gt;
            &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online&quot; class=&quot;nav-link text-primary&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-minimal-left&quot;&gt;&lt;/i&gt; &lt;span style=&quot;color: lightgray;&quot;&gt;Back to Welcome Page&lt;/span&gt;
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/register&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-laptop&quot;&gt;&lt;/i&gt; Register
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/login&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-single-02&quot;&gt;&lt;/i&gt; Login
                    &lt;/a&gt;
                &lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
    &lt;div class=&quot;wrapper wrapper-full-page&quot;&gt;
        &lt;div class=&quot;full-page login-page&quot;&gt;
            &lt;div class=&quot;content&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                        &lt;div class=&quot;col-lg-7 col-md-7 ml-auto mr-auto&quot;&gt;
        &lt;form class=&quot;form&quot; method=&quot;post&quot; action=&quot;https://www.bandmate.online/password/email&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot; autocomplete=&quot;off&quot;&gt;
            &lt;div class=&quot;bm_card card&quot;&gt;

                &lt;div class=&quot;card-header&quot;&gt;
                    &lt;h1 class=&quot;card-title&quot;&gt;Reset password&lt;/h1&gt;
                &lt;/div&gt;

                &lt;div class=&quot;card-body&quot;&gt;
                    
                    &lt;div class=&quot;input-group&quot;&gt;
                        &lt;div class=&quot;input-group-prepend&quot;&gt;
                            &lt;div class=&quot;input-group-text&quot;&gt;
                                &lt;i class=&quot;tim-icons icon-email-85&quot;&gt;&lt;/i&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;input type=&quot;email&quot; name=&quot;email&quot; style=&quot;border: solid 1px; background: white; color: black;&quot; class=&quot;form-control&quot; placeholder=&quot;Email&quot;&gt;
                                            &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;card-footer&quot;&gt;
                    &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary btn-lg btn-block mb-3&quot;&gt;Send Password Reset Link&lt;/button&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;footer style=&quot;opacity: 0.85;&quot; ; class=&quot;footer&quot;&gt;
    &lt;footer class=&quot;footer&quot;&gt;
        &lt;div class=&quot;container-fluid&quot;&gt;
            &lt;div class=&quot;copyright text-left&quot;&gt;
                &lt;b&gt;Version 1.0&lt;/b&gt;
            &lt;/div&gt;
            &lt;div class=&quot;copyright text-right&quot;&gt;
                &amp;copy; 2026 Copyright Rob Baartwijk
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/div&gt;
        &lt;script src=&quot;https://www.bandmate.online/black/js/core/jquery.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/popper.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/bootstrap.min.js&quot;&gt;&lt;/script&gt;
    &lt;!--  Google Maps Plugin    --&gt;
    &lt;!-- Place this tag in your head or just before your close body tag. --&gt;
    
    &lt;!-- Chart JS --&gt;
    
    &lt;!--  Notifications Plugin    --&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/plugins/bootstrap-notify.js&quot;&gt;&lt;/script&gt;

    &lt;script src=&quot;https://www.bandmate.online/black/js/black-dashboard.min.js?v=1.0.0&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/theme.js&quot;&gt;&lt;/script&gt;

    
    &lt;script&gt;
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $(&#039;.sidebar&#039;);
                $navbar = $(&#039;.navbar&#039;);
                $main_panel = $(&#039;.main-panel&#039;);

                $full_page = $(&#039;.full-page&#039;);

                $sidebar_responsive = $(&#039;body &gt; .navbar-collapse&#039;);
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $(&#039;.sidebar .sidebar-wrapper .nav li.active a p&#039;).html();

                $(&#039;.fixed-plugin a&#039;).click(function(event) {
                    if ($(this).hasClass(&#039;switch-trigger&#039;)) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $(&#039;.fixed-plugin .background-color span&#039;).click(function() {
                    $(this).siblings().removeClass(&#039;active&#039;);
                    $(this).addClass(&#039;active&#039;);

                    var new_color = $(this).data(&#039;color&#039;);

                    if ($sidebar.length != 0) {
                        $sidebar.attr(&#039;data&#039;, new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr(&#039;data&#039;, new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr(&#039;filter-color&#039;, new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr(&#039;data&#039;, new_color);
                    }
                });

                $(&#039;.switch-sidebar-mini input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $(&#039;body&#039;).removeClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini deactivated...&#039;);
                    } else {
                        $(&#039;body&#039;).addClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini activated...&#039;);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event(&#039;resize&#039;));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $(&#039;.switch-change-color input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).removeClass(&#039;white-content&#039;);
                        }, 900);
                        white_color = false;
                    } else {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).addClass(&#039;white-content&#039;);
                        }, 900);

                        white_color = true;
                    }
                });
            });
        });

    &lt;/script&gt;
    &lt;/body&gt;

&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETpassword-reset" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpassword-reset"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETpassword-reset" data-method="GET"
      data-path="password/reset"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpassword-reset"
                    onclick="tryItOut('GETpassword-reset');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpassword-reset"
                    onclick="cancelTryOut('GETpassword-reset');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpassword-reset"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>password/reset</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETpassword-reset"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETpassword-reset"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTpassword-email">Send a reset link to the given user.</h2>

<p>
</p>



<span id="example-requests-POSTpassword-email">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/password/email" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/password/email"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTpassword-email">
</span>
<span id="execution-results-POSTpassword-email" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTpassword-email"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-email"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTpassword-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-email">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTpassword-email" data-method="POST"
      data-path="password/email"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTpassword-email', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTpassword-email"
                    onclick="tryItOut('POSTpassword-email');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTpassword-email"
                    onclick="cancelTryOut('POSTpassword-email');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTpassword-email"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>password/email</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTpassword-email"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTpassword-email"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETpassword-reset--token-">Display the password reset view for the given token.</h2>

<p>
</p>

<p>If no token is present, display the link request form.</p>

<span id="example-requests-GETpassword-reset--token-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/password/reset/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/password/reset/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETpassword-reset--token-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=utf-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6ImFyWWZ1L1FWWmJUVWNZN01tM0RkUWc9PSIsInZhbHVlIjoiVTJ6YlZDbmhCQldmT0VGbU5DblBPbzkybkpBWmhicnhzQkhtUTk0MXRRYWZmNmt6WXZuajlSQUFibTFsZWNPTVo3YXNuRDhLaGpPWnZKdE9UZEhaamdRNm81NHAzdEVEVDJJM1ltZE1vYkM2Qm5ONmppcm5hbkhJakErV1BJVlQiLCJtYWMiOiI5NDc4MmZkZWQ2Y2FiNjBkZWI3NDhlODM2ZTkzNjBiODFhZTk1YjQzYzU5MzgxNTIyMmViODZmN2NlMDQ2YTQwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjVoSkpENS8xN0QwaGVubXVYSkNlOFE9PSIsInZhbHVlIjoiUk56dW1jekViUmxHQ0FPelp1V1hyTDd0RnQzYmtMU0dVVTlyWjFJOHVBRzBMb2hvRE05eHFCVkRRKzE5TUx3aHdhM0ZFOGxqMGFFcHBRYk1WamsxdE1WK0NMM0JqR1dOUHJ5R1ZXdEtFOVlCeXVkUm9jenBaalN4K0VkQ3RaVHMiLCJtYWMiOiJjYzExOTk3OTM0YTM2OGJkNzlmODFiM2Q0ZTBiOTlmYTNmZmVkYjczYmFiNDczYTY0M2Y3ZTk1Y2E4OGRkOTVjIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css&quot;&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chart.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels&quot;&gt;&lt;/script&gt;

import ChartDataLabels from &#039;chartjs-plugin-datalabels&#039;;

&lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;script&gt;
    document.addEventListener(&#039;DOMContentLoaded&#039;, function() {
        const simplemde = new SimpleMDE({
            element: document.getElementById(&quot;description&quot;),

            // configure the toolbar
            toolbar: [
                &quot;bold&quot;, &quot;italic&quot;, &quot;heading&quot;, &quot;|&quot;
                , &quot;quote&quot;, &quot;unordered-list&quot;, &quot;ordered-list&quot;, &quot;|&quot;
                , &quot;link&quot;, &quot;image&quot;
            , ]
        , });
    });

&lt;/script&gt;

&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;

&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;ie=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;

    &lt;meta name=&quot;csrf-token&quot; content=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot;&gt;

    &lt;title&gt;Bandmate&lt;/title&gt;
    &lt;!-- Favicon --&gt;
    &lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;76x76&quot; href=&quot;https://www.bandmate.online/black/img/apple-icon.png&quot;&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;https://www.bandmate.online/black/img/favicon.png&quot;&gt;
    &lt;!-- Fonts --&gt;
    &lt;link href=&quot;https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://use.fontawesome.com/releases/v5.0.6/css/all.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;link href=&quot;https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css&quot; rel=&quot;stylesheet&quot;&gt;
    &lt;!-- Icons --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/nucleo-icons.css&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;!-- CSS --&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/black-dashboard.css?v=1.0.0&quot; rel=&quot;stylesheet&quot; /&gt;
    &lt;link href=&quot;https://www.bandmate.online/black/css/theme.css&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;link href=&quot;https://www.bandmate.online/css/style.css&quot; rel=&quot;stylesheet&quot;&gt;

&lt;/head&gt;

&lt;style&gt;
    body {
        background-image: url(&#039;https://www.bandmate.online/images/Background_sharp.jpg&#039;);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.85;
    }

&lt;/style&gt;

&lt;body class=&quot;gloif login-page&quot;&gt;

    
        &lt;nav class=&quot;navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
        &lt;div class=&quot;navbar-wrapper&quot;&gt;
            &lt;div class=&quot;navbar-toggle d-inline&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;navbar-toggler&quot;&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar1&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar2&quot;&gt;&lt;/span&gt;
                    &lt;span class=&quot;navbar-toggler-bar bar3&quot;&gt;&lt;/span&gt;
                &lt;/button&gt;
            &lt;/div&gt;
            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;Reset password&lt;/a&gt;
        &lt;/div&gt;
        &lt;button class=&quot;navbar-toggler&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navigation&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
            &lt;span class=&quot;navbar-toggler-bar navbar-kebab&quot;&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navigation&quot;&gt;
            &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;
                &lt;li class=&quot;nav-item&quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online&quot; class=&quot;nav-link text-primary&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-minimal-left&quot;&gt;&lt;/i&gt; &lt;span style=&quot;color: lightgray;&quot;&gt;Back to Welcome Page&lt;/span&gt;
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/register&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-laptop&quot;&gt;&lt;/i&gt; Register
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class=&quot;nav-item &quot;&gt;
                    &lt;a href=&quot;https://www.bandmate.online/login&quot; class=&quot;nav-link&quot;&gt;
                        &lt;i class=&quot;tim-icons icon-single-02&quot;&gt;&lt;/i&gt; Login
                    &lt;/a&gt;
                &lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;
    &lt;div class=&quot;wrapper wrapper-full-page&quot;&gt;
        &lt;div class=&quot;full-page login-page&quot;&gt;
            &lt;div class=&quot;content&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                        &lt;div class=&quot;col-lg-5 col-md-7 ml-auto mr-auto&quot;&gt;
        &lt;form class=&quot;form&quot; method=&quot;post&quot; action=&quot;https://www.bandmate.online/password/reset&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;abxtaPhkX95wx4hZd2ZmhzEkmQb81wo6g1fBXzav&quot; autocomplete=&quot;off&quot;&gt;
            &lt;div class=&quot;card card-login card-white&quot;&gt;
                &lt;div class=&quot;card-header&quot;&gt;
                    &lt;img src=&quot;https://www.bandmate.online/black/img/card-primary.png&quot; alt=&quot;&quot;&gt;
                    &lt;h1 class=&quot;card-title&quot;&gt;Reset password&lt;/h1&gt;
                &lt;/div&gt;
                &lt;div class=&quot;card-body&quot;&gt;
                    
                    &lt;input type=&quot;hidden&quot; name=&quot;token&quot; value=&quot;architecto&quot;&gt;

                    &lt;div class=&quot;input-group&quot;&gt;
                        &lt;div class=&quot;input-group-prepend&quot;&gt;
                            &lt;div class=&quot;input-group-text&quot;&gt;
                                &lt;i class=&quot;tim-icons icon-email-85&quot;&gt;&lt;/i&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        &lt;input type=&quot;email&quot; name=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;Email&quot;&gt;
                                            &lt;/div&gt;
                    &lt;div class=&quot;input-group&quot;&gt;
                            &lt;div class=&quot;input-group-prepend&quot;&gt;
                                &lt;div class=&quot;input-group-text&quot;&gt;
                                    &lt;i class=&quot;tim-icons icon-lock-circle&quot;&gt;&lt;/i&gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;input type=&quot;password&quot; name=&quot;password&quot; class=&quot;form-control&quot; placeholder=&quot;Password&quot;&gt;
                                                    &lt;/div&gt;
                        &lt;div class=&quot;input-group&quot;&gt;
                            &lt;div class=&quot;input-group-prepend&quot;&gt;
                                &lt;div class=&quot;input-group-text&quot;&gt;
                                    &lt;i class=&quot;tim-icons icon-lock-circle&quot;&gt;&lt;/i&gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            &lt;input type=&quot;password&quot; name=&quot;password_confirmation&quot; class=&quot;form-control&quot; placeholder=&quot;Confirm Password&quot;&gt;
                        &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;card-footer&quot;&gt;
                    &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary btn-lg btn-block mb-3&quot;&gt;Reset Password&lt;/button&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/form&gt;
    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;footer style=&quot;opacity: 0.85;&quot; ; class=&quot;footer&quot;&gt;
    &lt;footer class=&quot;footer&quot;&gt;
        &lt;div class=&quot;container-fluid&quot;&gt;
            &lt;div class=&quot;copyright text-left&quot;&gt;
                &lt;b&gt;Version 1.0&lt;/b&gt;
            &lt;/div&gt;
            &lt;div class=&quot;copyright text-right&quot;&gt;
                &amp;copy; 2026 Copyright Rob Baartwijk
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/footer&gt;
        &lt;/div&gt;
    &lt;/div&gt;
        &lt;script src=&quot;https://www.bandmate.online/black/js/core/jquery.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/popper.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/core/bootstrap.min.js&quot;&gt;&lt;/script&gt;
    &lt;!--  Google Maps Plugin    --&gt;
    &lt;!-- Place this tag in your head or just before your close body tag. --&gt;
    
    &lt;!-- Chart JS --&gt;
    
    &lt;!--  Notifications Plugin    --&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/plugins/bootstrap-notify.js&quot;&gt;&lt;/script&gt;

    &lt;script src=&quot;https://www.bandmate.online/black/js/black-dashboard.min.js?v=1.0.0&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://www.bandmate.online/black/js/theme.js&quot;&gt;&lt;/script&gt;

    
    &lt;script&gt;
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $(&#039;.sidebar&#039;);
                $navbar = $(&#039;.navbar&#039;);
                $main_panel = $(&#039;.main-panel&#039;);

                $full_page = $(&#039;.full-page&#039;);

                $sidebar_responsive = $(&#039;body &gt; .navbar-collapse&#039;);
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $(&#039;.sidebar .sidebar-wrapper .nav li.active a p&#039;).html();

                $(&#039;.fixed-plugin a&#039;).click(function(event) {
                    if ($(this).hasClass(&#039;switch-trigger&#039;)) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $(&#039;.fixed-plugin .background-color span&#039;).click(function() {
                    $(this).siblings().removeClass(&#039;active&#039;);
                    $(this).addClass(&#039;active&#039;);

                    var new_color = $(this).data(&#039;color&#039;);

                    if ($sidebar.length != 0) {
                        $sidebar.attr(&#039;data&#039;, new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr(&#039;data&#039;, new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr(&#039;filter-color&#039;, new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr(&#039;data&#039;, new_color);
                    }
                });

                $(&#039;.switch-sidebar-mini input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $(&#039;body&#039;).removeClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini deactivated...&#039;);
                    } else {
                        $(&#039;body&#039;).addClass(&#039;sidebar-mini&#039;);
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage(&#039;Sidebar mini activated...&#039;);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event(&#039;resize&#039;));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $(&#039;.switch-change-color input&#039;).on(&quot;switchChange.bootstrapSwitch&quot;, function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).removeClass(&#039;white-content&#039;);
                        }, 900);
                        white_color = false;
                    } else {
                        $(&#039;body&#039;).addClass(&#039;change-background&#039;);
                        setTimeout(function() {
                            $(&#039;body&#039;).removeClass(&#039;change-background&#039;);
                            $(&#039;body&#039;).addClass(&#039;white-content&#039;);
                        }, 900);

                        white_color = true;
                    }
                });
            });
        });

    &lt;/script&gt;
    &lt;/body&gt;

&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETpassword-reset--token-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpassword-reset--token-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset--token-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETpassword-reset--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset--token-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETpassword-reset--token-" data-method="GET"
      data-path="password/reset/{token}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset--token-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpassword-reset--token-"
                    onclick="tryItOut('GETpassword-reset--token-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpassword-reset--token-"
                    onclick="cancelTryOut('GETpassword-reset--token-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpassword-reset--token-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>password/reset/{token}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETpassword-reset--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETpassword-reset--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="GETpassword-reset--token-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTpassword-reset">Reset the given user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-POSTpassword-reset">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/password/reset" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/password/reset"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTpassword-reset">
</span>
<span id="execution-results-POSTpassword-reset" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTpassword-reset"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-reset"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-reset">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTpassword-reset" data-method="POST"
      data-path="password/reset"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTpassword-reset', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTpassword-reset"
                    onclick="tryItOut('POSTpassword-reset');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTpassword-reset"
                    onclick="cancelTryOut('POSTpassword-reset');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTpassword-reset"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>password/reset</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTpassword-reset"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTpassword-reset"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETpassword-confirm">Display the password confirmation view.</h2>

<p>
</p>



<span id="example-requests-GETpassword-confirm">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/password/confirm" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/password/confirm"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETpassword-confirm">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlgyR0VOOHhLeGNIZno2MldJYlZnbkE9PSIsInZhbHVlIjoia3hZNzQweHhiRDdJZWl0OERydXFaVVRmQ3lHOHFPVXhySDV1dXJkR282VEFIZDNnUVA0K1M3YlFWYlRiOEVQU3AycHNzSWo4dHlLVWhlRkNLd2VRVWNvbnhEN2YvcytNZ0Y2OEw3eDJjUE9SczdwTWxVT2l5Nnl0WXNxQzBsT28iLCJtYWMiOiJlZWQyYThiZmRkZWYyNTNlNjA4MTZjMWQyMWY5ZTNkOGU3NDUwZjFiZjVjYzA0ZGE2MDcyMWE5Yjk3ZTVlYTNlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjdBSjVLVFFwcEpqSDVKbytvS2NxZVE9PSIsInZhbHVlIjoiYlhScmc1Vk4zam1BN1JDZ1NSckNrYVBqNUtoTm1neGhjQmFiRTVuUUhwWWg0M3JXWlVmSERmUVhhbWxzMFVvZm5icnhmaHVSZ2cwV3dQNENUUGZCdzVhWWdjeDNOYXBWLzNjZ3ZUQjMrOGtlMW1yaHB0NjI5WTQ1cE9LVDlhV3QiLCJtYWMiOiI5NjczZGRlOGU4MDBiMzZlMWZkM2MxMjVhN2VlYjNjMmQ3YzUwMGRjNTlkM2JlMGUyZDUzNDc0NmQ5MmQyY2U4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETpassword-confirm" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpassword-confirm"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-confirm"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-confirm">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETpassword-confirm" data-method="GET"
      data-path="password/confirm"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETpassword-confirm', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpassword-confirm"
                    onclick="tryItOut('GETpassword-confirm');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpassword-confirm"
                    onclick="cancelTryOut('GETpassword-confirm');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpassword-confirm"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>password/confirm</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETpassword-confirm"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETpassword-confirm"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTpassword-confirm">Confirm the given user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-POSTpassword-confirm">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/password/confirm" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/password/confirm"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTpassword-confirm">
</span>
<span id="execution-results-POSTpassword-confirm" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTpassword-confirm"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-confirm"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-confirm">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTpassword-confirm" data-method="POST"
      data-path="password/confirm"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTpassword-confirm', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTpassword-confirm"
                    onclick="tryItOut('POSTpassword-confirm');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTpassword-confirm"
                    onclick="cancelTryOut('POSTpassword-confirm');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTpassword-confirm"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>password/confirm</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTpassword-confirm"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTpassword-confirm"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GEThome">Show the application dashboard.</h2>

<p>
</p>



<span id="example-requests-GEThome">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/home" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/home"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GEThome">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjloREY1UTgzMjkvemFuRHRBVThFamc9PSIsInZhbHVlIjoiWGdFVzc4bUFFbUVUaC9sSkd0MWEyMEVleVVoSzJWK3BOZUt4eVpaSnVBOHNZQ0tHRHZsQThVRDR4OUhaRjFYUFdUeHcxcUJvZnV3TW40b3ducGhMeUZRdkFtSlZ2RE8zdzBGV2lPUmNLdm1nMTRmSU5yZFVZNUJlOFNiZTAxcWkiLCJtYWMiOiI4NzhkNThiZjQzMzgzNGJmZmQ3NWU0NzY2MmI1NzI4MjMxN2QzZDBmYTJlMDk5NDllOGRlMWEzYzE1YmY2YTM4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlppYnRJczUyQTZQRGljbkVLVDdsZGc9PSIsInZhbHVlIjoiVE9QcDZSUXpLWlJRdlZ0ZzlaSURkNjY4bGZ5V1djaE1wT1FVelZiem43d2phMXZ2eFRzUDJSRzNMMVZETXIxUGhuS1luczRzd2pIcW5IaWZ2bHdLSmdQN3ZyTzZST1ZxZDFCZll5UVE3OVdOYXI5UkhKdmxKN3hOUUsxNEpQN3IiLCJtYWMiOiI2YTUwNjAwY2I4OWRjMWI4ZmFjY2RhYmQ0NjRlNjZhOGQ3ZGZhM2Q0ZDU4ZWIwZDcyMWEyMDc0YzNlNjIwM2NlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GEThome" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GEThome"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GEThome"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GEThome" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GEThome" data-method="GET"
      data-path="home"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GEThome', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GEThome"
                    onclick="tryItOut('GEThome');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GEThome"
                    onclick="cancelTryOut('GEThome');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GEThome"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>home</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GEThome"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GEThome"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETinstruments">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETinstruments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/instruments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/instruments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETinstruments">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InpWakZXR1V1aGQrNzRVOTNXYmEwaFE9PSIsInZhbHVlIjoiTWpFa2NRTFJmQTltUjNPaEFqUGNLc01yaERFYVRhTkNKWnp3ZU0zYzhmQ1dvdUhYMXN3ejNhM2VFVFRFaDE1TExRU0FQbzdkNU02NTVreEZxOTc0NEMvRko0dGNycXRrTGk1RDVkMHhFYXFOSEhmcFJzOW9QazZ0dVFGYnhKdjEiLCJtYWMiOiI5MjJiMjBhMTdiOTZjM2NhY2ExZjZlY2RmY2U2YzcxNzAyMTlmYWEyYTM4OTE2N2YxM2E3NTNjMGRmNGFmZWI5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ii9NNGxxTVZjd2NDZVRmVmhEb1BNS2c9PSIsInZhbHVlIjoiQUxTTkF0YnJwNEhmenhIWkRsRzdxOWdiWm9JM3FvU25CWGNFaHVRbHJtV3VOc2NMSHU1Qld2NUhkRFdsUFdiTHlqOGJmRWNiRGRkb2JiMW5JSGJqYTBQTk0rME44V1BNWG5Kc3lHV3ovOW9IUC8xTk1FaWVyZlZJclV1Z3RGbVAiLCJtYWMiOiJlYWQ3NWVhNTlhZjRhYjllZGE3ODM3NzdiNTc0YmJhMmE0MmNjMjkyZWYxMWZkZGI2NDJmZGNkYzc1YzdmZWQ4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETinstruments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETinstruments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETinstruments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETinstruments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETinstruments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETinstruments" data-method="GET"
      data-path="instruments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETinstruments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETinstruments"
                    onclick="tryItOut('GETinstruments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETinstruments"
                    onclick="cancelTryOut('GETinstruments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETinstruments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>instruments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETinstruments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETinstruments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETinstruments-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETinstruments-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/instruments/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/instruments/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETinstruments-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InpENVVoOWc4bk5RdHBLQU1zOTh2a0E9PSIsInZhbHVlIjoicURtY0ZlbjFrRGhWaEVXOG5vSUlQYlpTY3huQzlaSXU1OUI0dnM5dU5Yb2Nhb29JUkNQUFowRzRBdm9hMHdGaStqaU9zN3ZSaEVFM2o5emd0Um9IdDdMV2NMVFRydURDb2VxbC8zV0JzR1Q5aTJwRElodmR4YmV1U2wzQVFRWW4iLCJtYWMiOiJmNGFiZWVkOGQ0MTg5NmFiYjNlMmE2MDhjNGRmYjQ5Yzc5ZDY2M2ZkZWE4MzhiMDljMDE4OWJmOGY5Y2UxNmU0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ik4xNHZPNFlFSjBGZHZzTnVMaFBSdFE9PSIsInZhbHVlIjoiV1ZBcEdZV1IrVzNsN1NWOVpPc1UvOGpyZXpMSHpWd0pkRUQrTE9VaUNpOGg3QjlFMVd5TTlsenplS2NUZ2xRMmNCQWR4Zkc3VkFqcTQ5Ri9tNTZYSC91N2Vvd3RWeFFUQkdYdklzV0dwQVhiYnJIMTRYeEhqU1M1ZDdFRkxrYk8iLCJtYWMiOiJkODBmM2ZiZjVlMDRkNTNjZGY4ZjBkNDc4YjRiNDc5ZmUzMjZiZDY5ZTcyZDNkYTliYTIwNTA4MjY4NjM4Njk5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETinstruments-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETinstruments-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETinstruments-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETinstruments-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETinstruments-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETinstruments-create" data-method="GET"
      data-path="instruments/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETinstruments-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETinstruments-create"
                    onclick="tryItOut('GETinstruments-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETinstruments-create"
                    onclick="cancelTryOut('GETinstruments-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETinstruments-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>instruments/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETinstruments-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETinstruments-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTinstruments">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTinstruments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/instruments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"type\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/instruments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "type": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTinstruments">
</span>
<span id="execution-results-POSTinstruments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTinstruments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTinstruments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTinstruments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTinstruments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTinstruments" data-method="POST"
      data-path="instruments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTinstruments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTinstruments"
                    onclick="tryItOut('POSTinstruments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTinstruments"
                    onclick="cancelTryOut('POSTinstruments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTinstruments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>instruments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTinstruments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTinstruments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTinstruments"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTinstruments"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETinstruments--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETinstruments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/instruments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/instruments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETinstruments--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ilo5T0JBM0lOMVM1RGRVbzJJSVQwcVE9PSIsInZhbHVlIjoiZVpnZDNtMm5CUG5qTGc0eEVnRHI4MHMyZzN4UzFudGdhSWlRb1REL3VjSUhjWTFZQVZ5bWFmWitaNTgvYmVSUFcrRjFlVFkyN3JRT3dpQks1SlRSK2loOGI3SjAzZFozblpBYXNRUmQzVVI5UHl2ZzJjcElqQmZqRTU2eERVTFoiLCJtYWMiOiI4ZDM4M2I1N2EwNTJlNjM0MzU3NjY3YWFkNzQwZTYzY2YxZGFjNWI4YWQ5NWQzYjBjNGEyN2FmZjVlNTNjZWQyIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlFKVkhRSWFFRS96YkZhVUVvL05wUXc9PSIsInZhbHVlIjoiMFh6bXlQalI3Y1JQTE9JYzJLaVVDVTB1Tjl0aXMyNnNJdDhrTllXbTVORG1tZm8zcmhydkdMQmZ6NURRY2lxVm9EOUh6UjQzdVpRZS9PS1NIQmhoZlRhNEtzNDlwR01WbjhnOTR0cSsrRm5jL2dseTVBQ1BvcW90UEZFQ2RiRlgiLCJtYWMiOiJiNWM1ZjhkYzM5NGFiMzI2ODM4YTM4NTIwZWI5MWY4N2VjZjQ5OGYyNDBmY2ViNmU3NDhhNWQ3ZWIxMjkzYTdhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETinstruments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETinstruments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETinstruments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETinstruments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETinstruments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETinstruments--id-" data-method="GET"
      data-path="instruments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETinstruments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETinstruments--id-"
                    onclick="tryItOut('GETinstruments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETinstruments--id-"
                    onclick="cancelTryOut('GETinstruments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETinstruments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>instruments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETinstruments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETinstruments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETinstruments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the instrument. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETinstruments--instrument_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETinstruments--instrument_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/instruments/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/instruments/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETinstruments--instrument_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Im8yUktNUzV1cWEzOG9WalFkL1ByT1E9PSIsInZhbHVlIjoicFNtVDYyR0tVamFKTW9yV0xXSHBoYkcrQ0xITFJLaEZMZzNUV3lITncwLytXYVc3UUlVd0Q0M1JIYjNRZmtvMWY0Zy9qc3BSSGc4T0xDbm1rRFlERnp5cldmbFFCOTVpVlBua096b21JSzBibVFqSlZ4RmFKc1ZNalBLa1JsRksiLCJtYWMiOiI5ODM2Y2Q0YjFlYjYzYjRmMjdkZGJiZWE2OTYyMTNkNzM3MDE5ODVmYjJiZTU0NWYzMThiNDU2MTg3N2NiM2Q2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImpVbDhoYnpjYWt0bUZ6alB3VFFrZmc9PSIsInZhbHVlIjoiSWlLMlVyWFF1SWMwTHVBdHRJL2ZqQ0I4bGVZM21Ob2lvU3RMMW1oblJlQk1QUStzQXkxd0JCa0VTRHNtc2NFNWZ2aEptS3pkcjdURFExYkxjaXRMZjBZWnVLT2t4RHA5Z0ZiZmJjcjd1Y1MyMmJtRGZlM2hxdyt1WTFZUGRXdTYiLCJtYWMiOiJhZmJmNDEzZGI2NWRlZjk4OWY0ZjAwYTU4NGI0MzAyYTg1MzQ3ZjExNjdiYzVlNWViNDNlZmVlZDRmOTQ3Nzk4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETinstruments--instrument_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETinstruments--instrument_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETinstruments--instrument_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETinstruments--instrument_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETinstruments--instrument_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETinstruments--instrument_id--edit" data-method="GET"
      data-path="instruments/{instrument_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETinstruments--instrument_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETinstruments--instrument_id--edit"
                    onclick="tryItOut('GETinstruments--instrument_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETinstruments--instrument_id--edit"
                    onclick="cancelTryOut('GETinstruments--instrument_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETinstruments--instrument_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>instruments/{instrument_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETinstruments--instrument_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETinstruments--instrument_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>instrument_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="instrument_id"                data-endpoint="GETinstruments--instrument_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the instrument. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTinstruments--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTinstruments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/instruments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"type\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/instruments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "type": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTinstruments--id-">
</span>
<span id="execution-results-PUTinstruments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTinstruments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTinstruments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTinstruments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTinstruments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTinstruments--id-" data-method="PUT"
      data-path="instruments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTinstruments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTinstruments--id-"
                    onclick="tryItOut('PUTinstruments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTinstruments--id-"
                    onclick="cancelTryOut('PUTinstruments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTinstruments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>instruments/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>instruments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTinstruments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTinstruments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTinstruments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the instrument. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTinstruments--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTinstruments--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEinstruments--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEinstruments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/instruments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/instruments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEinstruments--id-">
</span>
<span id="execution-results-DELETEinstruments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEinstruments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEinstruments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEinstruments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEinstruments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEinstruments--id-" data-method="DELETE"
      data-path="instruments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEinstruments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEinstruments--id-"
                    onclick="tryItOut('DELETEinstruments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEinstruments--id-"
                    onclick="cancelTryOut('DELETEinstruments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEinstruments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>instruments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEinstruments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEinstruments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEinstruments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the instrument. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETgenres">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETgenres">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/genres" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/genres"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETgenres">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImF1bWNYajRPQW9CMmdoeS9MUjRXQWc9PSIsInZhbHVlIjoiTU1ySUl0cGxuVzNTdlRzbmlua25DOUhFWWZBTjFQaXRkYWcxMkZJQmkzM01NWEpQSUdQVjZtaGsvZDdjVjdVdk1QQWdQS2d3alRod1FQaTU3ZTJGeTFNQVZOS0hlM1FSbWxiWEQ2N05kN3pFZ284UXNZbllYWW14WVpzZWFPaXciLCJtYWMiOiJkNmMwNDYzNjM1ODE5NGViOTQ1OTFkMDliOTFmNzc5MDA5NzI5MzE2Y2FkY2ZiZjVlNjEzMjA5N2IzNTQxYzk4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ik1pSXBDa0VWKzN6QlZSbjdRTlBjSkE9PSIsInZhbHVlIjoiMzJpREhuTjhUVnROTFA0QTZ4RTkrMUxIUHUxcEY1U0lPR253WHZHc1BSYlJzSGN6ZVNTNU5kMko4RWpTZDhNcU5JZ1BReEdLMG5NYWlJek5mdjR1RCtaRDV4Yjc1MThuRTNKdkFBSGdjSHpjWUdvVlVKU0RvcTBxQTB6NkloUnoiLCJtYWMiOiI1ZGMyNzY3NTMyNTZhZTI0MzRiNzQxZTNlNTQ5NjhmZDlhZGRhOWMzMDk3ZTcwN2NiMDhhYzQyNWMzMzBkNjVjIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETgenres" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETgenres"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETgenres"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETgenres" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgenres">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETgenres" data-method="GET"
      data-path="genres"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETgenres', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETgenres"
                    onclick="tryItOut('GETgenres');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETgenres"
                    onclick="cancelTryOut('GETgenres');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETgenres"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>genres</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETgenres"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETgenres"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETgenres-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETgenres-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/genres/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/genres/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETgenres-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IklzVmhvVy80T1FIdjVIejhVMTAzZ1E9PSIsInZhbHVlIjoib0xkWGVoZ1oxWC9PWWVpVjd3akgxdVA0MVVZSHlRQ3IzbnZpNjZHalRDanNvZ0hKdXJVQkNrK1JKS3Z3OG9pNXhreExuUGgyMjNyN3hjS05WY0FPeWM5QWx5WmNJRi9TY3JrcWRhUzJCRkJwUHZRMDFibGFOV0I3ZmU0cVhWS0MiLCJtYWMiOiJhOWNjY2I2ZjFkOGQ2Y2VjMGQ3YmUzODg3NTVjNjdlZDAwYzY0MzU2M2M2ZTI0NmMwMzdlZDczZTI4YzBhNjZhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IkN3bU9jeVo5UlV3NDhiZXNWK1VlQ1E9PSIsInZhbHVlIjoieG5CVGpuNUdTNHFiR21xcFdvTDFVeER0QXJiWm0wNnlqV3h1djNHOFJzeC92ZzkxalRnUzIvREVvcWZwTTRaYVk2U1dRaGFvcGNVaHM4RGtONDJzaTdxU3J6eTdnQ0Y0UzhzMDdrQmNHb3kvSzY3ZXlFNDU1eTc4UFdXM2ZjVHIiLCJtYWMiOiI0ZTAyMzIyNzBiZjE4MjNkZjcxMDRkODExNjA3NWJlMzYxYjBiNjEwNjZkZTMxOGRmYmM3OTNmNmQwNDRlN2I1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETgenres-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETgenres-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETgenres-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETgenres-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgenres-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETgenres-create" data-method="GET"
      data-path="genres/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETgenres-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETgenres-create"
                    onclick="tryItOut('GETgenres-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETgenres-create"
                    onclick="cancelTryOut('GETgenres-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETgenres-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>genres/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETgenres-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETgenres-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTgenres">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTgenres">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/genres" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"group\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/genres"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "group": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTgenres">
</span>
<span id="execution-results-POSTgenres" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTgenres"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTgenres"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTgenres" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgenres">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTgenres" data-method="POST"
      data-path="genres"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTgenres', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTgenres"
                    onclick="tryItOut('POSTgenres');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTgenres"
                    onclick="cancelTryOut('POSTgenres');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTgenres"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>genres</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTgenres"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTgenres"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTgenres"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>group</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="group"                data-endpoint="POSTgenres"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETgenres--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETgenres--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/genres/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/genres/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETgenres--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjlQUUpaMm5FdUlkQWxIUkxxVzNER1E9PSIsInZhbHVlIjoiMTRzUWg2Nm82Q0ZheTNLR1J1YW9DUk1MekRPaVAwM1RVd3pVQ3pvQ0RDVUsvbEpBb1VoWVZPS3pvYTlqUm1sL2E1dlZBYWNXRkdhb3JOU1EwWmw1MTRJV1JwVk5iYlBvM1ExOFE5Um5tYnpDMS9va0JrZ1pGK3h5WjFqTnRSa1oiLCJtYWMiOiI3MzlhMmViZTczZjk0NjgxMDBkNGM4YmQ0MjM2M2MxYTdjMWVhNWI0YmNmOTIwNjM1ZjczY2MxY2U1MjMwNzg0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ijg4YTZHR0I1SW00WWNGa3cxdVBoZHc9PSIsInZhbHVlIjoiN3VJTjlYK1R2Vk5EQnFIR1pOWFF6TlV5dVFZbitxd09POUE4S0UwY0dPMUcrUGFhNlowbFc1dHlzVHBYVk5mbW1MOEFibFA0THpHaGxWL3dCTWF3TFpWR2xpbWJXVGNkVUxUbEJCckU3L3o1dWNrZnVZRXRhbUVBTnNPRXp1R0MiLCJtYWMiOiJhNzVkY2JjNjU1NTIzMmU3YzhkYjFhZjVlMzI4YWJiY2M1MDA4NDA4ZjkxMWE0Nzc1YTk2ZTM4MTIzZWRkZWFkIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETgenres--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETgenres--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETgenres--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETgenres--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgenres--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETgenres--id-" data-method="GET"
      data-path="genres/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETgenres--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETgenres--id-"
                    onclick="tryItOut('GETgenres--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETgenres--id-"
                    onclick="cancelTryOut('GETgenres--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETgenres--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>genres/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETgenres--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETgenres--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETgenres--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the genre. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETgenres--genre_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETgenres--genre_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/genres/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/genres/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETgenres--genre_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Imd5UEFURW45WW1yNFlvNGZuODlRRGc9PSIsInZhbHVlIjoiN0Q1Mm5ZYldmZWZnNWx1TzJBM2EwZ2ZsUUk1NURjYW52YXRPUGdFTzhVd2FXb0pGRzhycUFxTW9yM2xaVXZkWDJYdkVYZG5WT0ZEeVA1M1JTQkhUWXptVUprWXpkMnNTY2xwTFI3RURRNW13YWdydUd0dGd5K2ZTVkVFdjlUVlkiLCJtYWMiOiIyMmUwZDc0ODI3MDJmZDc1OWYwYjdhYmQ0ZjYyYmJiNDlhYzcyYzI2YTJiM2ZhNjcyNmYzNTFhMTU4NzUyYzFmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlRpd1VSbVFHRmtnVTBiN3BrUlBWSkE9PSIsInZhbHVlIjoiemVwWXd5OUtLdzY1cTF5TjZ1eDlvOXQvQi9iYThkZzEvVHBOMURjM1VkQnpLRlJVTWdIWHIxNThPenM1cDRKeTBQMWVnaTJ2SDVLZEFXNHpZdVVxcmxGWmRIOWV4N0REeExxR1ZPaVFQTEc1aWVlUUNMZGZUQ3RCYTRvb0tEalYiLCJtYWMiOiIwNDkxODhkOGI2YzNkMDZiZDVkZmNjMzQyNDIyNWZlODZhYjk5YTUwNzcyNWQ1ZDkzZGFkZDAwMTM5OTM1OTQ3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETgenres--genre_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETgenres--genre_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETgenres--genre_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETgenres--genre_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgenres--genre_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETgenres--genre_id--edit" data-method="GET"
      data-path="genres/{genre_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETgenres--genre_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETgenres--genre_id--edit"
                    onclick="tryItOut('GETgenres--genre_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETgenres--genre_id--edit"
                    onclick="cancelTryOut('GETgenres--genre_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETgenres--genre_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>genres/{genre_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETgenres--genre_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETgenres--genre_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>genre_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="genre_id"                data-endpoint="GETgenres--genre_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the genre. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTgenres--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTgenres--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/genres/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"group\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/genres/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "group": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTgenres--id-">
</span>
<span id="execution-results-PUTgenres--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTgenres--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTgenres--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTgenres--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTgenres--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTgenres--id-" data-method="PUT"
      data-path="genres/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTgenres--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTgenres--id-"
                    onclick="tryItOut('PUTgenres--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTgenres--id-"
                    onclick="cancelTryOut('PUTgenres--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTgenres--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>genres/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>genres/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTgenres--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTgenres--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTgenres--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the genre. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTgenres--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>group</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="group"                data-endpoint="PUTgenres--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEgenres--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEgenres--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/genres/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/genres/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEgenres--id-">
</span>
<span id="execution-results-DELETEgenres--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEgenres--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEgenres--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEgenres--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEgenres--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEgenres--id-" data-method="DELETE"
      data-path="genres/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEgenres--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEgenres--id-"
                    onclick="tryItOut('DELETEgenres--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEgenres--id-"
                    onclick="cancelTryOut('DELETEgenres--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEgenres--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>genres/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEgenres--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEgenres--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEgenres--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the genre. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETrehearsalrooms">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETrehearsalrooms">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/rehearsalrooms" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/rehearsalrooms"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETrehearsalrooms">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ilhyd3JuSnV3SkhYT3greUUyeVBldlE9PSIsInZhbHVlIjoiQTJJT3dMZ2FJOFFzUnhYanlFdmllYVpEVjhTOUk2SDQrYlovQmo0UGNYOVNuZHgxZVk1WkJzcHBweGNpdmtaNjB4SHljdU9HZlFKWjg3YVhnQUppNWprcFZjZmJpUExnWVg0ZXJFZ0gvY1ZqOThwWmhMNytSSEFsVmRpdUZnejIiLCJtYWMiOiI2NjI1ZTI2NDIxYzMwN2E0NzMwOTA3MTVjYjFlNWFhOWM3OGQxMDA1ZmE1MWM2YjU5YTU2YWI0MWVmMjAzZDJlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ii81TXpBdFVmajRGV0daUU12QlRBVEE9PSIsInZhbHVlIjoiNmhxV25OWVp2S0QvWTE2d3N0c0lWWW5saGxGSUJROTZzSU81azRrUjVEMmx3aXhZUFZNWmFuTWdROXVZZWhvUFkxSUhIYU9Zd0NHTU5yNUpLM3FMNFIvOHBYNVVaNE16Q1RidkRIRHNvYkJEZ2Q0Mis0QkVhbzVVU0p5RlBDclgiLCJtYWMiOiI5OWMzZjg0ODUyMWY3NzA3ZjA0MDRiYjY4OGE4NTAxNTI3MzQwYjU3YjQ1YWFmZTQzMDNjZGViNGI2ZWNhMjFlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETrehearsalrooms" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETrehearsalrooms"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETrehearsalrooms"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETrehearsalrooms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETrehearsalrooms">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETrehearsalrooms" data-method="GET"
      data-path="rehearsalrooms"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETrehearsalrooms', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETrehearsalrooms"
                    onclick="tryItOut('GETrehearsalrooms');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETrehearsalrooms"
                    onclick="cancelTryOut('GETrehearsalrooms');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETrehearsalrooms"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>rehearsalrooms</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETrehearsalrooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETrehearsalrooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETrehearsalrooms-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETrehearsalrooms-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/rehearsalrooms/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/rehearsalrooms/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETrehearsalrooms-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjB4bjVIcHBacHhQWERRZXV4QTdLL2c9PSIsInZhbHVlIjoiWDJYVjBLb0FPcDlFQy9hL3o0bmQrQUY2MEZmZEQ4RW4wTHovdldrSFd0Y29PTW5tdWFTdS9KT2NyZlFLbE9zS0JiYnV5MlFmbjZvRktKN2VKUXVKNjB6WGQybVJqRUdxY2d0TVBhaW4wWXZ4WDU1dUR3azZiclBTTUMzTVpHQTMiLCJtYWMiOiIyYzMyMWRhZWYxMzM3NzdiZGYyYzYzY2Q1ZjRmOWY0MmJlZjgwMjg0MGMxMDliMmRmZDA4MWI0MjdlYzQzMjg0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlM1NlZLZHpwcjJYYWtnUWlBM3JHd2c9PSIsInZhbHVlIjoiVzFsOEVHalJYS2R6SDNrZFE1SFAzOHViK3VWYUc3enA4T0d0M0c0UFh4b0pPdzBkTXNyRjJqV1RVVjF6SmZLM3hTUURCWmlJdnlPODRZd0RjQTBkMG85d0h2NzhsNU9rV3hCaWgvelc5MXRKVHZHSlNsM0dLQ2hpTngzK3ZFYnMiLCJtYWMiOiI1MGI5MjU2MmU0NWI2MGEwMTQ3MWZjZGNmNTE0Y2E0MTVjMmQ2N2IyNjJiYTBlOTRjYzM3NWRiNjQwYTRhNWQxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETrehearsalrooms-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETrehearsalrooms-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETrehearsalrooms-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETrehearsalrooms-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETrehearsalrooms-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETrehearsalrooms-create" data-method="GET"
      data-path="rehearsalrooms/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETrehearsalrooms-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETrehearsalrooms-create"
                    onclick="tryItOut('GETrehearsalrooms-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETrehearsalrooms-create"
                    onclick="cancelTryOut('GETrehearsalrooms-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETrehearsalrooms-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>rehearsalrooms/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETrehearsalrooms-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETrehearsalrooms-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTrehearsalrooms">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTrehearsalrooms">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/rehearsalrooms" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"address\": \"architecto\",
    \"zip\": \"architecto\",
    \"city\": \"architecto\",
    \"state\": \"architecto\",
    \"country\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"architecto\",
    \"website\": \"http:\\/\\/bailey.com\\/\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/rehearsalrooms"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "address": "architecto",
    "zip": "architecto",
    "city": "architecto",
    "state": "architecto",
    "country": "architecto",
    "phone": "architecto",
    "email": "architecto",
    "website": "http:\/\/bailey.com\/"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTrehearsalrooms">
</span>
<span id="execution-results-POSTrehearsalrooms" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTrehearsalrooms"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTrehearsalrooms"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTrehearsalrooms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTrehearsalrooms">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTrehearsalrooms" data-method="POST"
      data-path="rehearsalrooms"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTrehearsalrooms', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTrehearsalrooms"
                    onclick="tryItOut('POSTrehearsalrooms');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTrehearsalrooms"
                    onclick="cancelTryOut('POSTrehearsalrooms');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTrehearsalrooms"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>rehearsalrooms</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTrehearsalrooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTrehearsalrooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>zip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="zip"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTrehearsalrooms"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTrehearsalrooms"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETrehearsalrooms--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETrehearsalrooms--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/rehearsalrooms/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/rehearsalrooms/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETrehearsalrooms--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImoyeDd5dDYrV1BvSnpBNFdJQ2RrVWc9PSIsInZhbHVlIjoidlVoMWh3S29xRzBJME1TUFpYSndBL2dZRGt4dmc1cEtJNExhb1E5UGlJT1hmK3llT25sVUg2V2RuTE1BTDBhdmtPb3VmZ0w5Z3RvWVFHa0c2Z09yVE9VRHVjL0JQZnl5a3piR0xPSHhPTG5lVGxQMisxdUhiQUpzUC9INHJSQUsiLCJtYWMiOiJjNDU5MGFmOTMxOWE1MGMwZDJjMTUyNzVjNWRkNTM4NzVmYzM4NmVjZThlZWY3YWUzY2Y2NDY4MTNhY2IxMTM2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjkwSGlxRE15SDNaMS92d0MxdWM2MGc9PSIsInZhbHVlIjoieDNTMkJwQ2NHTWJiR0MvQVVoUXlZRmJJZ05nOFhXb0JOWVI1eFlYRHVPVFBZd05ZSnI0ZE1wWHlDWDFwaDJqUXlGMUg0T3k5aXlLOExYRTkycitjMXJSalJ4Wk44cG9tTmh3aDFYbW9RUTNqbTROMTB1clVDWCtaTkxJK1ZzYmIiLCJtYWMiOiI3N2NjYTEyZDdiNDdlMjI2YTJjMmEzZWY5ZTg2MGJlNzRjM2NjMGNkZjhmOThmZmI0MDRhMDY4YWFiZjkzNDEyIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETrehearsalrooms--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETrehearsalrooms--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETrehearsalrooms--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETrehearsalrooms--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETrehearsalrooms--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETrehearsalrooms--id-" data-method="GET"
      data-path="rehearsalrooms/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETrehearsalrooms--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETrehearsalrooms--id-"
                    onclick="tryItOut('GETrehearsalrooms--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETrehearsalrooms--id-"
                    onclick="cancelTryOut('GETrehearsalrooms--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETrehearsalrooms--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>rehearsalrooms/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETrehearsalrooms--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETrehearsalrooms--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETrehearsalrooms--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the rehearsalroom. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETrehearsalrooms--rehearsalroom_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETrehearsalrooms--rehearsalroom_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/rehearsalrooms/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/rehearsalrooms/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETrehearsalrooms--rehearsalroom_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlZxM1B1QlE5bnhhcTRuT0tlVmxFakE9PSIsInZhbHVlIjoiTndCckJMWDZ4dTRyL3Q2YysxRFB2SDcwdFNLSjFONlBGZ1kvRlY5OGJsaWxLSDQxTGNSUFBWM0RycldCTzQ3VkNIaVY2K3Vva2JuTG9TaEQ1U3pKaDdWeENrc2VBU3g0MXF2VGlKR0FOYnlleHRvWUZUQ2I1TXpKVHRuVjVkbHIiLCJtYWMiOiIzOTIwYzVkZmNiNWViNTU1YjM2YjAwMmQ0MzA1YjJkZDJjZjkwYmNhMTZkNjNlMzQwOGQ0YjgxZmE2OWI0MDU1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InVvVlNIL1lxcVltMHhkSTJTMUFockE9PSIsInZhbHVlIjoiWWhxSVM3TUFWaHlObEV3bzMvSXkrWGR2Mzl6L29aR2RNWVdZRFp5TjduZi9LUEM3dExBbVlwelo3OWhZYnRZcnlWNHdRYmFEL1JBakxjTnQrdENqMFFYTXlJUWhWdW5ZdlBSUkFrbDRISk9USHExZjY2QkptVmUwWWpOaEh6alMiLCJtYWMiOiI3YTZlMDA2ZjExNGIwMGY5M2JjY2M2ZjYxMjY0YzJlNDQwZjk0MTNhOGM5NzcyZGQzNzhjYWM2OGYwZGM0NmE1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETrehearsalrooms--rehearsalroom_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETrehearsalrooms--rehearsalroom_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETrehearsalrooms--rehearsalroom_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETrehearsalrooms--rehearsalroom_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETrehearsalrooms--rehearsalroom_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETrehearsalrooms--rehearsalroom_id--edit" data-method="GET"
      data-path="rehearsalrooms/{rehearsalroom_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETrehearsalrooms--rehearsalroom_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETrehearsalrooms--rehearsalroom_id--edit"
                    onclick="tryItOut('GETrehearsalrooms--rehearsalroom_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETrehearsalrooms--rehearsalroom_id--edit"
                    onclick="cancelTryOut('GETrehearsalrooms--rehearsalroom_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETrehearsalrooms--rehearsalroom_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>rehearsalrooms/{rehearsalroom_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETrehearsalrooms--rehearsalroom_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETrehearsalrooms--rehearsalroom_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>rehearsalroom_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rehearsalroom_id"                data-endpoint="GETrehearsalrooms--rehearsalroom_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the rehearsalroom. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTrehearsalrooms--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTrehearsalrooms--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/rehearsalrooms/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"city\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/rehearsalrooms/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "city": "architecto",
    "phone": "architecto",
    "email": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTrehearsalrooms--id-">
</span>
<span id="execution-results-PUTrehearsalrooms--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTrehearsalrooms--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTrehearsalrooms--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTrehearsalrooms--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTrehearsalrooms--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTrehearsalrooms--id-" data-method="PUT"
      data-path="rehearsalrooms/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTrehearsalrooms--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTrehearsalrooms--id-"
                    onclick="tryItOut('PUTrehearsalrooms--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTrehearsalrooms--id-"
                    onclick="cancelTryOut('PUTrehearsalrooms--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTrehearsalrooms--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>rehearsalrooms/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>rehearsalrooms/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTrehearsalrooms--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTrehearsalrooms--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTrehearsalrooms--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the rehearsalroom. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTrehearsalrooms--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTrehearsalrooms--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTrehearsalrooms--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTrehearsalrooms--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETErehearsalrooms--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETErehearsalrooms--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/rehearsalrooms/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/rehearsalrooms/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETErehearsalrooms--id-">
</span>
<span id="execution-results-DELETErehearsalrooms--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETErehearsalrooms--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETErehearsalrooms--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETErehearsalrooms--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETErehearsalrooms--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETErehearsalrooms--id-" data-method="DELETE"
      data-path="rehearsalrooms/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETErehearsalrooms--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETErehearsalrooms--id-"
                    onclick="tryItOut('DELETErehearsalrooms--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETErehearsalrooms--id-"
                    onclick="cancelTryOut('DELETErehearsalrooms--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETErehearsalrooms--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>rehearsalrooms/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETErehearsalrooms--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETErehearsalrooms--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETErehearsalrooms--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the rehearsalroom. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETusers">Display a listing of the users</h2>

<p>
</p>



<span id="example-requests-GETusers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETusers">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlhDYjJNb1d2bG1kc0JBM0E3aHRNWVE9PSIsInZhbHVlIjoieVZCcjIxUG1EakRUcE10dXFabnlXQUhJSkZ1Q29NUXltaXJhY3BXcUsvYk40ZmZsMjQrbDNyZW4raFp4SWNZUkZMa2VSaXRqMm5EYzFGb1FjSFBDY05jeFJVdWlPS2NaSlBLcFFEY3FCMFpZc2o3ZnR4WXU0Qk9GZWxLelg1Z1ciLCJtYWMiOiI3MTQ2YjM5NDA3ZWU5ZWM0ZDFhZjE0Mzc0OTFjZjhmZmYxMzViOGRlODliMzhkMThjYTZmYzFlOGVmOWE3YzcwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InZLUHl6Wm1RaDB1Z01hS0ZUWHBsVHc9PSIsInZhbHVlIjoiSWtBL2lTRCtPQU9XaXFyNWpJeHhpbWl6bnlqNGpOeUwwUGNsM2NQWVFtd0xueGJNaXkvRlpuRkxKTnA2bmZ2aEVpSGJZa01Ub0g1cjk2aXFZUGIzTzQ5K2FkRXg4Ly9VbzZRQ2tYNXh1VmZHYVQrOFlxbXpVZ1FIMVF1MjdFZWMiLCJtYWMiOiJkMTg2ODMwZDU1ZmZmYmY0NmFiZmQ4MWNmYjMyOTkxNDc0YWFkMWViZmU4NzViYTQ1MGE5NDhiY2I0MzMwMDgxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETusers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETusers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETusers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETusers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETusers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETusers" data-method="GET"
      data-path="users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETusers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETusers"
                    onclick="tryItOut('GETusers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETusers"
                    onclick="cancelTryOut('GETusers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETusers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETusers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETusers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETusers--id-">GET users/{id}</h2>

<p>
</p>



<span id="example-requests-GETusers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETusers--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkY0RWt6Qk56aDM5bTNacmROVHlpSGc9PSIsInZhbHVlIjoia1kyVVJtUk8wbllESVAyazlPNFV1QWNzU2oxT2JuMm94V3VGSjVzVW1qRmI1TEpqSmEyeSt4UUx3eG54eVd3djllM05lRWRlTlZiSDgyRkRRS3psVmF5R2Ivc2FJRUpYUzZ3MlVTQ0NRVG1WMnN6d3crSC9Na3VCeVpWTnJJdE8iLCJtYWMiOiI0ZjE2YmRmMmEwNzZiMDY0YWRhYjk5ODZmNGU4ZmY4YmIxNTY5Y2ZmOTdmOTExYThhMmE4NDUyM2JmYmU2OTI3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IklSaVhYS2xVdnVGNU9GOUNNdVRNWHc9PSIsInZhbHVlIjoiaW56bklMdnBOQ2F3STIwNFRPWUQxYWZkbjZiY25ZOUx2VFJOb0k2WE9LUFNTUUMvQ0NKU1NnY1BKVGJJUXdGM1pwVS9Ga29seW5PVXhjS0lPVE45NVV4anVaaEZ1M2gyUytmTG0yb2l0bDRtVU1pVmJOOCsvTHphalJFTm5HZisiLCJtYWMiOiJlZDUyYTc0ODFmZDEyMjZiYzI2YTZiOGE5NWJlMDFkNWMxM2ZlMjFjMDdiOTQyOThlZjZiNmZjMGJkMzhjYmU1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETusers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETusers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETusers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETusers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETusers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETusers--id-" data-method="GET"
      data-path="users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETusers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETusers--id-"
                    onclick="tryItOut('GETusers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETusers--id-"
                    onclick="cancelTryOut('GETusers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETusers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETusers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETusers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETusers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETusers--user_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETusers--user_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/users/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/users/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETusers--user_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImwzaVRZYVhqcm9PZzFmOXlCdDRCbmc9PSIsInZhbHVlIjoiVlMvdUZzZWRxcm9uWHBVWWhHMWJIWUxzeXBaL0FoRjBST210bEhaRUJaVmluRFpiM0lTcW5FV3M3U2svSmRQNVRaeWhKejA2NzYrWTkxRmFxc0psK1YydS96NGdDc0ZON0RGNEpYZHVNalVtK2Jyb2UzVTBIQXZqRW9sWXNiYmciLCJtYWMiOiI3MTllOWFjNTBjZDJiNTFlMDNjMmI3YWMxY2ZkOWQyNTMxNjI0ZDM4ZDcyNGZlODk5MWI2NmQ1MGUyZjdmNjIxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlpLSW85Z0FlZ1B3SURWTDNQME03WHc9PSIsInZhbHVlIjoiS21PUVltUkZwL1VLc29rREw1ekd0M3MxOE9meVNQeGVXZ1B3Z0VNM0hYUDl6NjJuMFR3and4QTVmc2VyZmtMdWV4L2VaLy8ydEJBWG9nb21jK2VYV2FWZFgvd1FKMnFVckVIczlOZ0ZCalU1WnJwVTRkWEpMUzVhMVdpVnRkeUUiLCJtYWMiOiIxMTMyYzdhYzg4Y2E4NTA5NmFmMTI2NjAyZmYzZWE2MDkxYWUzYjA4MmIwN2UwMmE1YzE5ZDI0N2M3ZjcyMDk5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETusers--user_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETusers--user_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETusers--user_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETusers--user_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETusers--user_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETusers--user_id--edit" data-method="GET"
      data-path="users/{user_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETusers--user_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETusers--user_id--edit"
                    onclick="tryItOut('GETusers--user_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETusers--user_id--edit"
                    onclick="cancelTryOut('GETusers--user_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETusers--user_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>users/{user_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETusers--user_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETusers--user_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETusers--user_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTusers--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTusers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTusers--id-">
</span>
<span id="execution-results-PUTusers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTusers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTusers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTusers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTusers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTusers--id-" data-method="PUT"
      data-path="users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTusers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTusers--id-"
                    onclick="tryItOut('PUTusers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTusers--id-"
                    onclick="cancelTryOut('PUTusers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTusers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>users/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTusers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTusers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTusers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTusers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTusers--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEusers--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEusers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEusers--id-">
</span>
<span id="execution-results-DELETEusers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEusers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEusers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEusers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEusers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEusers--id-" data-method="DELETE"
      data-path="users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEusers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEusers--id-"
                    onclick="tryItOut('DELETEusers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEusers--id-"
                    onclick="cancelTryOut('DELETEusers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEusers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEusers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEusers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEusers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETacts">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/acts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/acts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETacts">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImlFTHlMVEt4aXMxU2xjYUQyRC9BQXc9PSIsInZhbHVlIjoiNCtZcmxaMHFCZEpxenB0bFVIVnpDUXB6dDBkU042a0tGVjVaQ3dXSnpKc2N3RERCTkxMeWR0WWFSeTVuMTJGN0V4TEZXWlFnYUhZS0dJTm4rNzZtNkoxT254bmJKRTlUSXZnWVdqOVZhWG9VdkpLMEJDT3Y2aVgyRHlSbGhnaVoiLCJtYWMiOiI1ZGM4ZjFmYjllOTA2N2I2MWZlYzljYWU2NmMyZDE1MmM0OWYxNDYxMTMzZTEyNDRmY2U3Zjk0NWUzNDJhY2U2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ii9mY1Q2cGZPUHkyVTJIOFo1OXZ0OHc9PSIsInZhbHVlIjoieHdQcmVIVVU3ZU5DcU8zK1p5V3BEd1ZYUkFTVFlhOWFWSnVRTjcvcnlscUE4RzJFbzlTSWdqK0J0ZHZOZ2hZM0hWSzl1L3dEMzRwdENGYnMwZEEvL0xMVndXQXFyRnNzckJvdUpFOEJhdUVyZFFJRzkzTDI1bVloaURlKzloOEciLCJtYWMiOiI4YzEwYzZkMGE4Y2FhZjEyNzc3N2Q0YTNlOWE3NGM2YjdlZDE0M2JlNDhkZjFlYTlhNTFjMTI0YjY0YjAzMTVmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETacts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETacts" data-method="GET"
      data-path="acts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETacts"
                    onclick="tryItOut('GETacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETacts"
                    onclick="cancelTryOut('GETacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETacts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>acts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETacts-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETacts-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/acts/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/acts/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETacts-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkM3MnRsNWFGRjR0R05NU2Y4QjBtRnc9PSIsInZhbHVlIjoiOUREdk5FdXY4T2NKNkNPY3JZU01oWXNxWlQ1V2ZvdEYzN212QTRjUUtkWUllWjZvdllRd3h4T1J5Z2xVWjVrZnJiL1Jmd1ZKVzhNR3lzSUI2eWJVSzA0VnA3MGJ5Z1AyWnBuT1MrSlZDSktDc0tjUDV2NmRObkNsSHMvaXdjNVgiLCJtYWMiOiJlZTIwMWM3MjRmZjZmZGEzODY5YjI0ZWM1NDk0YmNiNDllMjEwODljMjM5NjRhM2QzNjMxNjYzYzNiMGM0YzExIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Im9ydThXeW5iRW1DcU44OVZuZTFseFE9PSIsInZhbHVlIjoiZHdSSnJkZ1FwNkFWR1hEQ3hLSEE1dWUxSTRMYzNrRnZaSzRjTTJRK2g0RWU2MCtENlZ1aHZXUDhWOE5sT2RmV1BhcjhzWjVUU0loUlZ4M21SckVpOEI0b0wvWWZQMWtkelYySEZSSXVUS29Vc2Nyc3dVOWl1NnZGcUpQSVN6eUciLCJtYWMiOiIxZTFhZTYzZTExZjVlOTE0MDFhOTZjYmIzYmQ2OGNhZmZjZGFkMWM2MzQyNDM0NWU2NDkyNzgyZGMxZjFiNjQ4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETacts-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETacts-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETacts-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETacts-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacts-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETacts-create" data-method="GET"
      data-path="acts/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETacts-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETacts-create"
                    onclick="tryItOut('GETacts-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETacts-create"
                    onclick="cancelTryOut('GETacts-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETacts-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>acts/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETacts-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETacts-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTacts">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/acts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"genre_id\": \"architecto\",
    \"number_of_members\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"zbailey@example.net\",
    \"website\": \"https:\\/\\/www.gulgowski.com\\/nihil-accusantium-harum-mollitia-modi-deserunt\",
    \"description\": \"architecto\",
    \"facebook\": \"http:\\/\\/bailey.com\\/\",
    \"instagram\": \"http:\\/\\/rempel.com\\/sunt-nihil-accusantium-harum-mollitia\",
    \"twitter\": \"http:\\/\\/www.considine.com\\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem\",
    \"youtube\": \"http:\\/\\/www.dare.org\\/iure-odit-et-et-modi-ipsum-nostrum-omnis\",
    \"youtubedemo\": \"http:\\/\\/mclaughlin.info\\/dolores-enim-non-facere-tempora\",
    \"soundcloud\": \"http:\\/\\/www.leffler.info\\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum\",
    \"spotify\": \"https:\\/\\/nitzsche.net\\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html\",
    \"bluesky\": \"https:\\/\\/www.balistreri.org\\/dignissimos-neque-blanditiis-odio\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/acts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "genre_id": "architecto",
    "number_of_members": "architecto",
    "phone": "architecto",
    "email": "zbailey@example.net",
    "website": "https:\/\/www.gulgowski.com\/nihil-accusantium-harum-mollitia-modi-deserunt",
    "description": "architecto",
    "facebook": "http:\/\/bailey.com\/",
    "instagram": "http:\/\/rempel.com\/sunt-nihil-accusantium-harum-mollitia",
    "twitter": "http:\/\/www.considine.com\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem",
    "youtube": "http:\/\/www.dare.org\/iure-odit-et-et-modi-ipsum-nostrum-omnis",
    "youtubedemo": "http:\/\/mclaughlin.info\/dolores-enim-non-facere-tempora",
    "soundcloud": "http:\/\/www.leffler.info\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum",
    "spotify": "https:\/\/nitzsche.net\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html",
    "bluesky": "https:\/\/www.balistreri.org\/dignissimos-neque-blanditiis-odio"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTacts">
</span>
<span id="execution-results-POSTacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTacts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTacts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTacts" data-method="POST"
      data-path="acts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTacts"
                    onclick="tryItOut('POSTacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTacts"
                    onclick="cancelTryOut('POSTacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTacts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>acts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTacts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>genre_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="genre_id"                data-endpoint="POSTacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>number_of_members</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="number_of_members"                data-endpoint="POSTacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTacts"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTacts"
               value="https://www.gulgowski.com/nihil-accusantium-harum-mollitia-modi-deserunt"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://www.gulgowski.com/nihil-accusantium-harum-mollitia-modi-deserunt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTacts"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>facebook</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="facebook"                data-endpoint="POSTacts"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instagram</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instagram"                data-endpoint="POSTacts"
               value="http://rempel.com/sunt-nihil-accusantium-harum-mollitia"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://rempel.com/sunt-nihil-accusantium-harum-mollitia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>twitter</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="twitter"                data-endpoint="POSTacts"
               value="http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>youtube</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="youtube"                data-endpoint="POSTacts"
               value="http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>youtubedemo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="youtubedemo"                data-endpoint="POSTacts"
               value="http://mclaughlin.info/dolores-enim-non-facere-tempora"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://mclaughlin.info/dolores-enim-non-facere-tempora</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>soundcloud</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="soundcloud"                data-endpoint="POSTacts"
               value="http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spotify</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="spotify"                data-endpoint="POSTacts"
               value="https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bluesky</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bluesky"                data-endpoint="POSTacts"
               value="https://www.balistreri.org/dignissimos-neque-blanditiis-odio"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://www.balistreri.org/dignissimos-neque-blanditiis-odio</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETacts--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/acts/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/acts/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETacts--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkxnNm1qSTFXc1lSb3hsSFUzSGdsMmc9PSIsInZhbHVlIjoiL3FHL2pGeHM1U0t4YTVrQlpQYzNxbFUzbUo2eTk2SkhCbUxQbU5jTmtaVldreU1IZTZKOVYwdWZ4OGUzZmdtTStCalUzdW9xeXFYNXlqdGdjZmhEU3d4eHdMclJkVGsrTklJcEtjeW5xWkV3WDhLWG5YTkNKYVY1OFBTQU1CK1IiLCJtYWMiOiJhYmExOThjOTllNjI4MjVmZTJiZTljMWUyNWJlMzRjNmY3YzM0NzMwOWFiNWQ0YmI0NTgwYWQ2NTgzN2IxMDUwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImM4VlJKeG1weU1pUEhFTzNFR2lEb3c9PSIsInZhbHVlIjoiTmZoQ1BOMnlvV1AydG1OZ3pUMjJLRzJidWx1Y0VCelMxdTJvQVF0QUF4WGxmSjFjeWxranVkRVdQTFUxYll0dGlEeXgweUI1eEJMRlR1RDQ2ckUxdDhDbnJtbkZQUmdNWTliRGpuaXhuS0RJdkNPYlBqNzZnMmQ3OGkwRTU3VHUiLCJtYWMiOiJlN2UyNTFkNWMwMTJiM2VmZDA0ZWYyZWE4ZDY5ZWE3ZDM3Y2RlZWYwYmU0MzBkMzY2YTQ4NDA1YmFlYWVjYTMwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETacts--id-" data-method="GET"
      data-path="acts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETacts--id-"
                    onclick="tryItOut('GETacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETacts--id-"
                    onclick="cancelTryOut('GETacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETacts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>acts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETacts--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the act. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETacts--act_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETacts--act_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/acts/4/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/acts/4/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETacts--act_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkQwVXJhanFsQmhKbDJ2TVU1V1RCNWc9PSIsInZhbHVlIjoiOWpNQzAzaXZESW9iUUZwRVNITmt4eVJ2VnFrZDJMVGtjTUxxSGc5WWl5ODErRjNicHpQQlRWRURwQ3dNNlVvK0c5cnBqTGdwYjAzT0huclBjTnBTNWpuakt3eDdnMEZPRzFzVVJ4NWhqQjduQkNxQ3dlMFBSaDhDNjA3ejY0cmMiLCJtYWMiOiJjYWNjZmE0OTA2YjAyNTU0ZjNkMzlmOGEwNDg5NWEzZGZiNTk1YTY1MjYxZjZjZWEyMDllZjExYjllYTc4N2FlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IkhaVXg1SjRyM3pKTGRjOUh4OFprb1E9PSIsInZhbHVlIjoieTJBamh6QjU0bkF0R3B2OEhuZ280TEJsaXI3THBTYVdIbGNQcVAwU0o0WjlFQ0tlN25mRzl1bEtWOUxuNVlhOUJzU1VTR0s1YTdEOEVRMTlUYWdkWmZieURNU2d3emFiZmx0dFlvOGFMZHREeTZmbjEyRmdWTGFHNCtlUHk1TDQiLCJtYWMiOiI5Mjc4MjhkNzkyZTEwOTkwOGRlYmZiZWRmMjkzMDgzMWM1OTQzZmY4YjExODg1NzU5MWEzN2I5ZmM5MTUxZmEwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETacts--act_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETacts--act_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETacts--act_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETacts--act_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacts--act_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETacts--act_id--edit" data-method="GET"
      data-path="acts/{act_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETacts--act_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETacts--act_id--edit"
                    onclick="tryItOut('GETacts--act_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETacts--act_id--edit"
                    onclick="cancelTryOut('GETacts--act_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETacts--act_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>acts/{act_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETacts--act_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETacts--act_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>act_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="act_id"                data-endpoint="GETacts--act_id--edit"
               value="4"
               data-component="url">
    <br>
<p>The ID of the act. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTacts--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/acts/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"genre_id\": \"architecto\",
    \"number_of_members\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"zbailey@example.net\",
    \"website\": \"https:\\/\\/www.gulgowski.com\\/nihil-accusantium-harum-mollitia-modi-deserunt\",
    \"description\": \"architecto\",
    \"facebook\": \"http:\\/\\/bailey.com\\/\",
    \"instagram\": \"http:\\/\\/rempel.com\\/sunt-nihil-accusantium-harum-mollitia\",
    \"twitter\": \"http:\\/\\/www.considine.com\\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem\",
    \"youtube\": \"http:\\/\\/www.dare.org\\/iure-odit-et-et-modi-ipsum-nostrum-omnis\",
    \"youtubedemo\": \"http:\\/\\/mclaughlin.info\\/dolores-enim-non-facere-tempora\",
    \"soundcloud\": \"http:\\/\\/www.leffler.info\\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum\",
    \"spotify\": \"https:\\/\\/nitzsche.net\\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html\",
    \"bluesky\": \"https:\\/\\/www.balistreri.org\\/dignissimos-neque-blanditiis-odio\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/acts/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "genre_id": "architecto",
    "number_of_members": "architecto",
    "phone": "architecto",
    "email": "zbailey@example.net",
    "website": "https:\/\/www.gulgowski.com\/nihil-accusantium-harum-mollitia-modi-deserunt",
    "description": "architecto",
    "facebook": "http:\/\/bailey.com\/",
    "instagram": "http:\/\/rempel.com\/sunt-nihil-accusantium-harum-mollitia",
    "twitter": "http:\/\/www.considine.com\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem",
    "youtube": "http:\/\/www.dare.org\/iure-odit-et-et-modi-ipsum-nostrum-omnis",
    "youtubedemo": "http:\/\/mclaughlin.info\/dolores-enim-non-facere-tempora",
    "soundcloud": "http:\/\/www.leffler.info\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum",
    "spotify": "https:\/\/nitzsche.net\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html",
    "bluesky": "https:\/\/www.balistreri.org\/dignissimos-neque-blanditiis-odio"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTacts--id-">
</span>
<span id="execution-results-PUTacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTacts--id-" data-method="PUT"
      data-path="acts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTacts--id-"
                    onclick="tryItOut('PUTacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTacts--id-"
                    onclick="cancelTryOut('PUTacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTacts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>acts/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>acts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTacts--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the act. Example: <code>4</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTacts--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>genre_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="genre_id"                data-endpoint="PUTacts--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>number_of_members</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="number_of_members"                data-endpoint="PUTacts--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTacts--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTacts--id-"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="PUTacts--id-"
               value="https://www.gulgowski.com/nihil-accusantium-harum-mollitia-modi-deserunt"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://www.gulgowski.com/nihil-accusantium-harum-mollitia-modi-deserunt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTacts--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>facebook</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="facebook"                data-endpoint="PUTacts--id-"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instagram</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instagram"                data-endpoint="PUTacts--id-"
               value="http://rempel.com/sunt-nihil-accusantium-harum-mollitia"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://rempel.com/sunt-nihil-accusantium-harum-mollitia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>twitter</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="twitter"                data-endpoint="PUTacts--id-"
               value="http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>youtube</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="youtube"                data-endpoint="PUTacts--id-"
               value="http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>youtubedemo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="youtubedemo"                data-endpoint="PUTacts--id-"
               value="http://mclaughlin.info/dolores-enim-non-facere-tempora"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://mclaughlin.info/dolores-enim-non-facere-tempora</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>soundcloud</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="soundcloud"                data-endpoint="PUTacts--id-"
               value="http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spotify</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="spotify"                data-endpoint="PUTacts--id-"
               value="https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bluesky</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bluesky"                data-endpoint="PUTacts--id-"
               value="https://www.balistreri.org/dignissimos-neque-blanditiis-odio"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://www.balistreri.org/dignissimos-neque-blanditiis-odio</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEacts--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/acts/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/acts/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEacts--id-">
</span>
<span id="execution-results-DELETEacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEacts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEacts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEacts--id-" data-method="DELETE"
      data-path="acts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEacts--id-"
                    onclick="tryItOut('DELETEacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEacts--id-"
                    onclick="cancelTryOut('DELETEacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEacts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>acts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEacts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEacts--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the act. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETvacancies">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETvacancies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/vacancies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/vacancies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvacancies">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjVYd0pJdk0wdTNXRURGL1p2LzZobnc9PSIsInZhbHVlIjoiY0tWNWlLR1docEwzb2Nyd0lqMmFwbUFVWkV3WThPQThtTlU2SUw3aTlXcHhNVmFBQUl5ZmNFSTcvdVJEcVVGOSt2Z2NWNlVScTVQUTF2MmZPODNBSllvR1RtaS9lZnc0TEl0R3VIUndoRUQ0Um5KYTlBYUhrSkhnRGdrcVpyT1EiLCJtYWMiOiI4YjhmNDI3NDBkY2RiNmEwMjE1YzFmODQzMmVkZjhmNzlkZGQ3YzYxMzA2N2RkOWVhMWE1OTg0OGM1MTkxOTQ1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlpCZkNPbWRnVUpSdEF0VXVJZndqVHc9PSIsInZhbHVlIjoiOTVoNEZISU5LNDBUYytGSVlheXgyd202ck8xZVRGWFJQcjRKKzBTY3QraXAyU1Z0RGRGdG1kdDdRQjIwVmFHSEcwN1AwWHZ2SGZ0VUR4YlVGbjhkUFRob2RIR3JhcWxVY3NwVVoxVUE0b3RlZzBWSVNFdUhaZ2hDelYvajdzV3AiLCJtYWMiOiJiYTM2YWFhZTRiM2MxZWRhODE0OTBhMDNlZjExYTNlYWMyODE5OTE2YjRmZDViOGVjMjJiYjFiNDc1N2E4M2NiIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvacancies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvacancies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvacancies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvacancies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvacancies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvacancies" data-method="GET"
      data-path="vacancies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvacancies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvacancies"
                    onclick="tryItOut('GETvacancies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvacancies"
                    onclick="cancelTryOut('GETvacancies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvacancies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>vacancies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETvacancies-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETvacancies-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/vacancies/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/vacancies/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvacancies-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InBCY0p0dVFrdXJRUkRLbHh0NXBCeVE9PSIsInZhbHVlIjoiRUs3SmVUVWNsbEp0N3VvcUs3eEt4QXlYM3BCTFZjTk5RR3pjRmxkWklOMm1LUzk0YzErc2dtSzNCKzhXOFFLOVZIdHBJK2g2K3IrL2F5YjhWSXNidEhDeXNnQzcyVElnM1JGNnIwZDUrSVVoUWE5bVRiTFZYUTE2Q3AzOWdpUEIiLCJtYWMiOiJiYTJmN2YxZjE3YzAyNjQ2MTI5M2ZmNWM5NGJhNmU1ZWVhN2VhYjBmYTc2MWVkZGNiNjEyYWU0NWRhNThhZTNlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjhxWFRJMWNiaWF1UHNuUmlOQm4wUUE9PSIsInZhbHVlIjoiODFZbTZFOFg4Y3BSOUpXRVdkVWFNSldJWWJCSCtTVmh0VDhqU3pzRi9rdUhzMnFOakE2Ynhnb0VEQlVaTFBqOFFaUmg1R3NUSlVLMUh5dlk4WFBpZmVJaVI2ZTJyY2U2aEthcW5INDZyMjJGOExMa1NtYVc0eVVBNDdlUGpoUFciLCJtYWMiOiI4MjdjOTYyOGI4NWY5MjI5MWYzZjE2YjA3NDc4MjBmYmZhY2Y3MDdhYzRlODEyMGVmZmZmNGQ3Zjk1MzdjMTc1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvacancies-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvacancies-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvacancies-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvacancies-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvacancies-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvacancies-create" data-method="GET"
      data-path="vacancies/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvacancies-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvacancies-create"
                    onclick="tryItOut('GETvacancies-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvacancies-create"
                    onclick="cancelTryOut('GETvacancies-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvacancies-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>vacancies/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvacancies-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvacancies-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTvacancies">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTvacancies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/vacancies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"act_id\": \"architecto\",
    \"instrument_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/vacancies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "act_id": "architecto",
    "instrument_id": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTvacancies">
</span>
<span id="execution-results-POSTvacancies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTvacancies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTvacancies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTvacancies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTvacancies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTvacancies" data-method="POST"
      data-path="vacancies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTvacancies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTvacancies"
                    onclick="tryItOut('POSTvacancies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTvacancies"
                    onclick="cancelTryOut('POSTvacancies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTvacancies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>vacancies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTvacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTvacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>act_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="act_id"                data-endpoint="POSTvacancies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrument_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrument_id"                data-endpoint="POSTvacancies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETvacancies--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETvacancies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/vacancies/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/vacancies/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvacancies--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InNGSmJyRkhxdkpDVk5OaUtwYzZ1Zmc9PSIsInZhbHVlIjoidTBIbjNhSjVRdk9LOHUrN1o2aDlHWTdVcnV3akVPY09xTzVMUlN4cG5GRmJJWmpscDBPeUM2VE16bTFTQWQwcjUyMTV1c1FSZHF1R3FQUnRQLytvN3FDdmpaRXV2eklSNVpTUTdHQ3JnenpYWWVYQUllSWZJeFFabzU5QVRTUW4iLCJtYWMiOiIyNDMxZTM3NWNkOTY4ODNjZjdlZmUzZDFlNzM5NDRkZDUxZWMwODgxNWJlZGI1ZWUyZWVmMzdhY2EyYjEzZmRhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IncvTmdTVWpQMUh6K0NtUFpIV2Znb0E9PSIsInZhbHVlIjoiNHIxL3V6cXU1M2p1VUxHQXBmUEV4anJLU0ZJWml6OFlMclVOazVoSmpvT2dMbEVwbTViQmw2cCswN2tQVUwrODRLYzMvRzVoZnhIYU81bFE1c0N5M3VZNmZDdU44OWVaZjFHWDllR1BCVmZ1aEZCRHNwdWFWNithZTlNU0lVVGwiLCJtYWMiOiJmNzBjYWI0MzExNTI4YzEzYzdiMjQxZjRhN2U3ZjczNDEzZjI3MzlkZmI4ZjUxODBkNDhiZWQxNzg5NWNkM2ExIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvacancies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvacancies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvacancies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvacancies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvacancies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvacancies--id-" data-method="GET"
      data-path="vacancies/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvacancies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvacancies--id-"
                    onclick="tryItOut('GETvacancies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvacancies--id-"
                    onclick="cancelTryOut('GETvacancies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvacancies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>vacancies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETvacancies--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the vacancy. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETvacancies--vacancy_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETvacancies--vacancy_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/vacancies/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/vacancies/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvacancies--vacancy_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Imo2dzBlMzh5RUxuS0YzMytEOUM0dHc9PSIsInZhbHVlIjoiSERkWXRBOFZFYk5kbDNpbUM1N0pMVTlWQ2MwZy9aSGZRRUdaVm9kbDlRZ1R2QmRaenVqNWhnUzVSSnBsMUlVQ2hMcUI0UndveDVQNXF2N01XZFRTZEVRQnErNFNZbXJlTG9wbHowOHlqYVRuTDIxOEZZSGpuOUNBL2cwT0o4NDkiLCJtYWMiOiI2YjQzOTVjMmY3MWZiNWJkYzBjODg0MjdlZWRiOTE3NmU1Y2M3ZTk3MDVjMzFjNzc5ODFlYjQ5OWNjMGQ4YTJhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjQyaDNXMzNFbUF1cGpudnJ6bG1qU1E9PSIsInZhbHVlIjoiSHQvSlRWTkFPTmc5bytKb3pxMEYwd1pWdCs5NWg0a09XUXR0NncyRktZaWxhQ2x3WDgya2JzZjJnUi9HSDB2dTNaSUpYaW1GYXJFSzM3VDVmTERPL09ZTmQ5RUdTdHpKd1Y4UTMwV3JkVFlCU0VZNngwdldRazhJV1V1TFc5R2IiLCJtYWMiOiJkYTRjOThiYTZlZjUzODFkNTc4NjNjNDZiODlkNzk5ZGRlZTY1OTk1ZjBiY2E4YWY0M2I5YmI5MTcwNTI4NDQ5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvacancies--vacancy_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvacancies--vacancy_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvacancies--vacancy_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvacancies--vacancy_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvacancies--vacancy_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvacancies--vacancy_id--edit" data-method="GET"
      data-path="vacancies/{vacancy_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvacancies--vacancy_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvacancies--vacancy_id--edit"
                    onclick="tryItOut('GETvacancies--vacancy_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvacancies--vacancy_id--edit"
                    onclick="cancelTryOut('GETvacancies--vacancy_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvacancies--vacancy_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>vacancies/{vacancy_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvacancies--vacancy_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvacancies--vacancy_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>vacancy_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="vacancy_id"                data-endpoint="GETvacancies--vacancy_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the vacancy. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTvacancies--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTvacancies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/vacancies/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"act_id\": \"architecto\",
    \"instrument_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/vacancies/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "act_id": "architecto",
    "instrument_id": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTvacancies--id-">
</span>
<span id="execution-results-PUTvacancies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTvacancies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTvacancies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTvacancies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTvacancies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTvacancies--id-" data-method="PUT"
      data-path="vacancies/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTvacancies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTvacancies--id-"
                    onclick="tryItOut('PUTvacancies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTvacancies--id-"
                    onclick="cancelTryOut('PUTvacancies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTvacancies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>vacancies/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>vacancies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTvacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTvacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTvacancies--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the vacancy. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>act_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="act_id"                data-endpoint="PUTvacancies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrument_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrument_id"                data-endpoint="PUTvacancies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEvacancies--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEvacancies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/vacancies/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/vacancies/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEvacancies--id-">
</span>
<span id="execution-results-DELETEvacancies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEvacancies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEvacancies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEvacancies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEvacancies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEvacancies--id-" data-method="DELETE"
      data-path="vacancies/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEvacancies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEvacancies--id-"
                    onclick="tryItOut('DELETEvacancies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEvacancies--id-"
                    onclick="cancelTryOut('DELETEvacancies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEvacancies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>vacancies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEvacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEvacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEvacancies--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the vacancy. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETvenues">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETvenues">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/venues" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/venues"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvenues">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjFoR3FXWm0wWnpKelI0N3pyVURicGc9PSIsInZhbHVlIjoiVFhiSXJXSXFGM0dOd2kxTWoxa2tld2dhaHh4VnkzT25IY1BWV2swaFIxeHVQSmJjaU9VQWVjV0NaaXRONGFNSGo4OXloWTBhM0lLQkRncVdXdlpKK2xZM0k4RTJ1YWJncE95R0lIVUdOeU1pSFMyZnErc1BoSDRHMGlFK01iYnIiLCJtYWMiOiIxNzY5NDJkNzRkODUzYWU5ODVmZGM0YmZiMzAwZWQ1YTBlMmViNDBlNzg4ZGRhZDY4YmRjZDRhNzIzYjhmNTU5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjRWQWh5b3M2RS92R0ZhRWFtSFpRSFE9PSIsInZhbHVlIjoiT3lLRC9NSjNGSnZrL0hBOEdNS1pxcHovcFMrVUU5WWlPWjdMdlRxRzN0NTVtN3NuOUM1ZUQrNm5zNEZZRkVBSzdOSFc2QlN6L29lNFBqQm1kV0RnSTF0dGNJVm9hVVA2WC80akRFOUpSRkVHZjVJdkgzYzFGT3U5R2xNekdTV1kiLCJtYWMiOiI0MDQ5YzJhZWQ5YmMzMGQ1OGMxNmNjMDY2ZjY4NDhhNWM0ZTZjZTJjZDI1MjVhM2VkMDdmY2NlMmJkMWZmNDU4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvenues" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvenues"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvenues"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvenues" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvenues">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvenues" data-method="GET"
      data-path="venues"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvenues', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvenues"
                    onclick="tryItOut('GETvenues');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvenues"
                    onclick="cancelTryOut('GETvenues');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvenues"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>venues</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvenues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvenues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETvenues-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETvenues-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/venues/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/venues/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvenues-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjBFODVBUC9HTS8rZmo2b1F5Tk5OSUE9PSIsInZhbHVlIjoiM1R3TFc0Y0pobmF4bmpOdFVQQy9LanlvQ2ZKcElDNVl1Z2dQTHZBK3RKaldaYThMZVdvcmhlUXNPeW1mN2ExMEd1OENFQm9GSFhlaG9QMS9iZkY0ZHBkcS95SlJmVWM2SXdEU0V2eGU3SnhnZlNOcktlM00wZTVYTEtyQ2tPYWkiLCJtYWMiOiJhNmQxNTcwYmMzNThhMWVjYTgwNWY2MmI3YjllOTU3OGFhMDgxODczNGQxYTYzMDYyMTI4NzAxNzhjNmZjNTZmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ilk1TDVwZm0zZE44WXYxSWtyczcxR1E9PSIsInZhbHVlIjoiOXQzNzZicCtvKzJKdThPeUZTM29jQXYwUldMblplOXRDQU12ak5LOEh2blQvQlloV09IT1NHZ3BXZTQ5dEl3VlJCd0lFR2hWbEsxcExMNTJjc3ZLejFaZ0hOQ202amZNVWZlSjMrYnhhRnczMEFnVzlXSEc4RlhTWGhyazR2eEYiLCJtYWMiOiIyY2VkOGQ5M2Y0ZDc2ZmU0ZjIyZTQyNWY5M2FlYjMxYTAyYmNmZjIwMjdjMTY0ZGEyMzYwMWZhYzQyYTdjZTBmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvenues-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvenues-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvenues-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvenues-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvenues-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvenues-create" data-method="GET"
      data-path="venues/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvenues-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvenues-create"
                    onclick="tryItOut('GETvenues-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvenues-create"
                    onclick="cancelTryOut('GETvenues-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvenues-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>venues/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvenues-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvenues-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTvenues">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTvenues">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/venues" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"address\": \"architecto\",
    \"zip\": \"architecto\",
    \"city\": \"architecto\",
    \"state\": \"architecto\",
    \"country\": \"architecto\",
    \"website\": \"http:\\/\\/bailey.com\\/\",
    \"phone\": \"miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt\",
    \"email\": \"pauline09@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/venues"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "address": "architecto",
    "zip": "architecto",
    "city": "architecto",
    "state": "architecto",
    "country": "architecto",
    "website": "http:\/\/bailey.com\/",
    "phone": "miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt",
    "email": "pauline09@example.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTvenues">
</span>
<span id="execution-results-POSTvenues" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTvenues"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTvenues"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTvenues" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTvenues">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTvenues" data-method="POST"
      data-path="venues"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTvenues', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTvenues"
                    onclick="tryItOut('POSTvenues');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTvenues"
                    onclick="cancelTryOut('POSTvenues');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTvenues"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>venues</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTvenues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTvenues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTvenues"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTvenues"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>zip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="zip"                data-endpoint="POSTvenues"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTvenues"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state"                data-endpoint="POSTvenues"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="POSTvenues"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTvenues"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTvenues"
               value="miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt"
               data-component="body">
    <br>
<p>Must match the regex /^([0-9\s-+()]*)$/. Must be at least 10 characters. Example: <code>miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTvenues"
               value="pauline09@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>pauline09@example.com</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETvenues--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETvenues--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/venues/39" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/venues/39"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvenues--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Im8xd3lYbUNmNzBBSm55NzdKWGQxYlE9PSIsInZhbHVlIjoidWh2SWhCQ0dSRFJ2SmgwQ3lTdWJIa3ZRZlZDN09hVGNCdFRsQWU4a0IrVm9UQ1VWYW90YWhseHhGRG9rQkF0S2RBU2lZaWRXRkRvS3BMeFI3T0tQK01qSW5hZnlnZTc2U3h0eVc0ZnZzU3poQUZGV2VOWXgyOEdFRmlIVm9VeXciLCJtYWMiOiI0MGZjNmY4NTY1NWQ4ZWIwNTk0Yjk2NzcyMmM3MTkwYmJkYTU4ZDlmMmMwNzEwMGI4MWVhM2I5ZjI2MzgwYTA2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlVJZEhaeU9aeWk1REZSWE8wd0VTR3c9PSIsInZhbHVlIjoiNGhiTG55VmprNkJ6RExmWHVUdXo0Q0pidko2QURYV2JEMG1BWkFQeW40OGlwRktSVGdoaDNUeGJiZEx1SkxCZ0c0VHpyeDZyeFF2K0lPeTVlUkNLMHVlSVBoTklreXUrQkl2RzlrYnhMT2paa05UQUMzSWYzZlFGRVRCTTF2c0IiLCJtYWMiOiIxNTBiMmE5YTA3OTdjOTUyZmFmNDE0MDZjYTg0NjkxN2Y4MjhmYjBkYmE0YTkzYzEyMjI4ZmJlMjdiYjlkMTM0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvenues--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvenues--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvenues--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvenues--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvenues--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvenues--id-" data-method="GET"
      data-path="venues/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvenues--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvenues--id-"
                    onclick="tryItOut('GETvenues--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvenues--id-"
                    onclick="cancelTryOut('GETvenues--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvenues--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>venues/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvenues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvenues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETvenues--id-"
               value="39"
               data-component="url">
    <br>
<p>The ID of the venue. Example: <code>39</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETvenues--venue_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETvenues--venue_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/venues/39/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/venues/39/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETvenues--venue_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImNiRGVVamdWV3F5emJyaU5XVWhHSUE9PSIsInZhbHVlIjoiWGlNVDhjdHkrVUcwU002a1RpWGR5TjBCLzgxT3FHeTAzNWgwZlFTZWJTWXJJbXQxTkptY0xBbTA0TmRmalJOOENyV0hESnU1OFVlM1Fodk9Pa0M1TzY5anRQcFhPZG52QzlmQjNTMWhSd0kveVI4Y3p0NkNyMlV0MzlyOVd6WHQiLCJtYWMiOiIxYjczNWJkODI1NGZhZjU1ODc5Mzk0MDMyMzM4ZjAyN2I2ZWVjMTZmNzUwMDM3Nzc3NGY2MDZhNWZkNzgxZDUzIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImlMQkl2TytqS2lEK3pOZEhhMGlJWXc9PSIsInZhbHVlIjoiTW81VC95UHdRdGViejNUSXFhekt3V1hPcWw1MzFqM1djTDVpK2RHU0l4Q0xORldXc2hNaFNVZmoxOFdHb0J6Q3FQWTNPTnk0NHNzS3R4ODlhemFwSDQxc0htRWp1QjFla0tSV0JrVnlsZEJ2RHBWNDRNK21NSlJWcWhzejc0YS8iLCJtYWMiOiI2NmI3ZjgwZWMwOWE3OGMwMzlhZmMyNmJlZjVkNDc1N2EwMzkwOTM1ZDA0OWQwNGY2NzQyYWM4NGFlZGIzNzc4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETvenues--venue_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETvenues--venue_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETvenues--venue_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETvenues--venue_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETvenues--venue_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETvenues--venue_id--edit" data-method="GET"
      data-path="venues/{venue_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETvenues--venue_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETvenues--venue_id--edit"
                    onclick="tryItOut('GETvenues--venue_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETvenues--venue_id--edit"
                    onclick="cancelTryOut('GETvenues--venue_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETvenues--venue_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>venues/{venue_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETvenues--venue_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETvenues--venue_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>venue_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="venue_id"                data-endpoint="GETvenues--venue_id--edit"
               value="39"
               data-component="url">
    <br>
<p>The ID of the venue. Example: <code>39</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTvenues--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTvenues--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/venues/39" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"address\": \"architecto\",
    \"zip\": \"architecto\",
    \"city\": \"architecto\",
    \"state\": \"architecto\",
    \"country\": \"architecto\",
    \"website\": \"http:\\/\\/bailey.com\\/\",
    \"phone\": \"miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt\",
    \"email\": \"pauline09@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/venues/39"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "address": "architecto",
    "zip": "architecto",
    "city": "architecto",
    "state": "architecto",
    "country": "architecto",
    "website": "http:\/\/bailey.com\/",
    "phone": "miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt",
    "email": "pauline09@example.com"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTvenues--id-">
</span>
<span id="execution-results-PUTvenues--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTvenues--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTvenues--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTvenues--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTvenues--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTvenues--id-" data-method="PUT"
      data-path="venues/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTvenues--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTvenues--id-"
                    onclick="tryItOut('PUTvenues--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTvenues--id-"
                    onclick="cancelTryOut('PUTvenues--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTvenues--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>venues/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>venues/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTvenues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTvenues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTvenues--id-"
               value="39"
               data-component="url">
    <br>
<p>The ID of the venue. Example: <code>39</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTvenues--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTvenues--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>zip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="zip"                data-endpoint="PUTvenues--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTvenues--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state"                data-endpoint="PUTvenues--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="PUTvenues--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="PUTvenues--id-"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTvenues--id-"
               value="miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt"
               data-component="body">
    <br>
<p>Must match the regex /^([0-9\s-+()]*)$/. Must be at least 10 characters. Example: <code>miyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTvenues--id-"
               value="pauline09@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>pauline09@example.com</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEvenues--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEvenues--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/venues/39" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/venues/39"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEvenues--id-">
</span>
<span id="execution-results-DELETEvenues--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEvenues--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEvenues--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEvenues--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEvenues--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEvenues--id-" data-method="DELETE"
      data-path="venues/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEvenues--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEvenues--id-"
                    onclick="tryItOut('DELETEvenues--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEvenues--id-"
                    onclick="cancelTryOut('DELETEvenues--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEvenues--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>venues/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEvenues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEvenues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEvenues--id-"
               value="39"
               data-component="url">
    <br>
<p>The ID of the venue. Example: <code>39</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETagencies">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETagencies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/agencies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/agencies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETagencies">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InpoQkhLc1VMd3lJQ0NVNHAvdjhGRHc9PSIsInZhbHVlIjoibncvUHA2VXBaNkNEQVk4MGFkeERGTmgzTlhhMXRkQlFTMWxwS1k1ay9ETzZzOHB4ckNyVTJmVEI4RURBd3JDZ0FGUHVUaEsxRTlCYVAzUUgzclVMeDMzRUp0U3prUDNrWVNwd09nQXBZdFdFRjRyQmJ1NHp5eTRabVVDSGZ2cmoiLCJtYWMiOiI5MjlmNDlmNDZiNmM0YzA4NTkyYjAxMzJlNjE3NDUwYzExOTg4YzllN2QwNDcwNmRjYTM2YjdiZjY4OTA5ZWY5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjJxdzB2Y0dQVWhSWE1oT1FqV1kyblE9PSIsInZhbHVlIjoiNjl2bEM5eE94a0svSzI2VjZvd2pkN3FQcTgwY0t3YkxJcERpcHFkUUFERzUyemtjVWtxaXZQaGVVZWUxdFlMcXFrSHhOaTJ1VDZoZmpmSC9zOWl5UldjSFlWbjJTN2NuZ3hsbmtaY2lHMWJyM2RCV1F0SU1kNGQzVzVsdUUySk8iLCJtYWMiOiJlNWQ2NTYwMDViZTdjOWEzYmYwOGIzNjY3NTA2NGFlYzNmNzZhOTA2YWJjOTQ5ZTBjYTdlZDc2MDUxNTc5YTZhIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETagencies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETagencies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETagencies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETagencies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETagencies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETagencies" data-method="GET"
      data-path="agencies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETagencies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETagencies"
                    onclick="tryItOut('GETagencies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETagencies"
                    onclick="cancelTryOut('GETagencies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETagencies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>agencies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETagencies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETagencies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETagencies-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETagencies-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/agencies/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/agencies/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETagencies-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlNvQWhrbVpHT2IvYzhGR2lwZk1JY3c9PSIsInZhbHVlIjoiRjFsM05OSi9SdHU4ZVNjc3dDS3hDUCs3WjZ2OHlWZnFHMEdMU252NVlIUFpIbkdCbXl5WGhjN1ZyMDlGVEx6WUxGMmpMQ0RBWjFwdTE2ZEUrenl4M1hhTndxVDgyeU02cDRuWG40Smw5UWFNd2tmVG9CK09qc056bnZvVUUzTVkiLCJtYWMiOiI0OWQ0MjA1MDU1NjA3YzEyNzI0ODJlMzBjYzMzMmU2ZDY5YTliOWJkNmZlZTc3ODE4MjRiZWQ2Mjg2NThjNjY1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlNnTzhmTUpvMWh6WDU4blJnZnlzb1E9PSIsInZhbHVlIjoiNnJ4SUNqcUhkQ1R4RWcwcUR6UXdPYjZpODRLQThMUDFIN2ZpVGZIc21UUklJL01WK2NXZUljTEZnZXVjZk9jUVZuUk15amdKcVFjNWxCNnNqZ2NoREo1RmZWdlhxNWN5eTdJZFlZUCtST0c3clYrYi96bkxaV3gvK2pqQS9BOXAiLCJtYWMiOiJmNWNmNjQ1ZjZmZGI1MTQxOTVlYTYxYmM5OGQ3NWE4OGIyMjJjODZhNzdhYTdkMGVjZDE3OGM1YTBhODE3YjM2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETagencies-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETagencies-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETagencies-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETagencies-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETagencies-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETagencies-create" data-method="GET"
      data-path="agencies/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETagencies-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETagencies-create"
                    onclick="tryItOut('GETagencies-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETagencies-create"
                    onclick="cancelTryOut('GETagencies-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETagencies-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>agencies/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETagencies-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETagencies-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTagencies">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTagencies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/agencies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"address\": \"architecto\",
    \"zip\": \"architecto\",
    \"city\": \"architecto\",
    \"state\": \"architecto\",
    \"country\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"architecto\",
    \"website\": \"http:\\/\\/bailey.com\\/\",
    \"facebook\": \"http:\\/\\/rempel.com\\/sunt-nihil-accusantium-harum-mollitia\",
    \"twitter\": \"http:\\/\\/www.considine.com\\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem\",
    \"instagram\": \"http:\\/\\/www.dare.org\\/iure-odit-et-et-modi-ipsum-nostrum-omnis\",
    \"youtube\": \"http:\\/\\/mclaughlin.info\\/dolores-enim-non-facere-tempora\",
    \"soundcloud\": \"http:\\/\\/www.leffler.info\\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum\",
    \"spotify\": \"https:\\/\\/nitzsche.net\\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/agencies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "address": "architecto",
    "zip": "architecto",
    "city": "architecto",
    "state": "architecto",
    "country": "architecto",
    "phone": "architecto",
    "email": "architecto",
    "website": "http:\/\/bailey.com\/",
    "facebook": "http:\/\/rempel.com\/sunt-nihil-accusantium-harum-mollitia",
    "twitter": "http:\/\/www.considine.com\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem",
    "instagram": "http:\/\/www.dare.org\/iure-odit-et-et-modi-ipsum-nostrum-omnis",
    "youtube": "http:\/\/mclaughlin.info\/dolores-enim-non-facere-tempora",
    "soundcloud": "http:\/\/www.leffler.info\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum",
    "spotify": "https:\/\/nitzsche.net\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTagencies">
</span>
<span id="execution-results-POSTagencies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTagencies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTagencies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTagencies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTagencies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTagencies" data-method="POST"
      data-path="agencies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTagencies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTagencies"
                    onclick="tryItOut('POSTagencies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTagencies"
                    onclick="cancelTryOut('POSTagencies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTagencies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>agencies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTagencies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTagencies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>zip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="zip"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTagencies"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTagencies"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>facebook</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="facebook"                data-endpoint="POSTagencies"
               value="http://rempel.com/sunt-nihil-accusantium-harum-mollitia"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://rempel.com/sunt-nihil-accusantium-harum-mollitia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>twitter</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="twitter"                data-endpoint="POSTagencies"
               value="http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instagram</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instagram"                data-endpoint="POSTagencies"
               value="http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>youtube</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="youtube"                data-endpoint="POSTagencies"
               value="http://mclaughlin.info/dolores-enim-non-facere-tempora"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://mclaughlin.info/dolores-enim-non-facere-tempora</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>soundcloud</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="soundcloud"                data-endpoint="POSTagencies"
               value="http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spotify</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="spotify"                data-endpoint="POSTagencies"
               value="https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETagencies--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETagencies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/agencies/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/agencies/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETagencies--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ikt2aENjWUVvOFVtRjBVL2RVbGRaZGc9PSIsInZhbHVlIjoiVEp1eGtCUlMrMG9PWVM0NGZUcVp1V2FxYzFHbXRkMVhYQ2l0UjQrU1dEcDlvVG9FTE84UVBUSkxoK3pFTmJ3Y2pnaEpYOWUrazF6ZGlWWWJqUU9pQ0JvN3ZQeUU1Q0pndXZ2ZkhybEJCZkpOYnJsaU1aSTdWb2sxQkgwVkpKRDciLCJtYWMiOiI1YmY3M2UzNGIxOWFjMDc0NjdlMmYwZmYxYWZiMDk0OTZmMThlM2QzMmFiOTcxNjA5OTU1NTJmMTBmNTAwMmMxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjJjTUdGVlZZNHhlREZnMWZjUUVqVGc9PSIsInZhbHVlIjoiSEZYN0k2OUpmUDVGNlRiMUNKK2c2K0RxRzAwTGxsTEpFMjQ0Z3pZeVBpM0NuMm82WlE4MW41d3R5R1lWdHJ3c2dtUjVaSWttWTlYeVlzMGthMjJlVUwvMTFQVCtVY0IwNGV3RjVqRUxyK1IyeW5hcitNVmFOVjNLeERiOFdaOUQiLCJtYWMiOiJjMjdmZWUyYTZjMjRmOWI5Mjg5YmY2OWFkY2YwYzgxNDNiYzFmODViOTAwNjZiMjBmOWU4Y2I5ODVjMmEwM2Q2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETagencies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETagencies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETagencies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETagencies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETagencies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETagencies--id-" data-method="GET"
      data-path="agencies/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETagencies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETagencies--id-"
                    onclick="tryItOut('GETagencies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETagencies--id-"
                    onclick="cancelTryOut('GETagencies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETagencies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>agencies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETagencies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETagencies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETagencies--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the agency. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETagencies--agency_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETagencies--agency_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/agencies/4/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/agencies/4/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETagencies--agency_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlhaUTdWbWE1RDRtc04wUzh6NjNQQ1E9PSIsInZhbHVlIjoicUY4UmlqQitHdFRldEF6bjF4TlN5dFNwQzk1SFdwelpRbFpzTTYzeFdKdGxvZS9yYnNGNWMxcklGalE0alBuQitUVkNIbEJmVlpkalB5QUNnK2NqVW0rNjNKK1hpbEsyb0RwcEF0cVpQOEl2NTZjcElvSUgvaS9qdG0rZjBrekYiLCJtYWMiOiJlODdiYmRlZjdiNzBhZWZiYjlmNmE4ZTNjOWYwOTM1YmMxMjU4ODE4ZTVkNTcxMGU3ZDQxZWZhZWJhMjY1ZjA2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjZRemVWY2VxYjVXOWN4SHN1STV3bHc9PSIsInZhbHVlIjoiM2JWaTRMN3ZGMkFFc0w1YnVRZ0J4blRoNEVsOWN3VkdDL3dtY3B5T3NlcUNQK01VdUJGUVh6eUZ4U21zR2pKRXpVZHQyM0FKNnBuTFMxUFoyR01HeHhkdzRzeFNkUi9tTE00elBWVXNYNE1mN2ZOSUZxTHhiakZ0S2x5WkY5ZkgiLCJtYWMiOiJhYjExZTY3ZDVkMTgzOWFlYWNhZDNkMDg5OTE4ODY2ZDdkMDZkOGQ2ZDdhMTE1OGFhMGQ5NTc4NTUwNDJmYmZiIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETagencies--agency_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETagencies--agency_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETagencies--agency_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETagencies--agency_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETagencies--agency_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETagencies--agency_id--edit" data-method="GET"
      data-path="agencies/{agency_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETagencies--agency_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETagencies--agency_id--edit"
                    onclick="tryItOut('GETagencies--agency_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETagencies--agency_id--edit"
                    onclick="cancelTryOut('GETagencies--agency_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETagencies--agency_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>agencies/{agency_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETagencies--agency_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETagencies--agency_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>agency_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="agency_id"                data-endpoint="GETagencies--agency_id--edit"
               value="4"
               data-component="url">
    <br>
<p>The ID of the agency. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTagencies--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTagencies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/agencies/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"address\": \"architecto\",
    \"zip\": \"architecto\",
    \"city\": \"architecto\",
    \"state\": \"architecto\",
    \"country\": \"architecto\",
    \"phone\": \"architecto\",
    \"email\": \"architecto\",
    \"website\": \"http:\\/\\/bailey.com\\/\",
    \"facebook\": \"http:\\/\\/rempel.com\\/sunt-nihil-accusantium-harum-mollitia\",
    \"twitter\": \"http:\\/\\/www.considine.com\\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem\",
    \"instagram\": \"http:\\/\\/www.dare.org\\/iure-odit-et-et-modi-ipsum-nostrum-omnis\",
    \"youtube\": \"http:\\/\\/mclaughlin.info\\/dolores-enim-non-facere-tempora\",
    \"soundcloud\": \"http:\\/\\/www.leffler.info\\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum\",
    \"spotify\": \"https:\\/\\/nitzsche.net\\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/agencies/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "address": "architecto",
    "zip": "architecto",
    "city": "architecto",
    "state": "architecto",
    "country": "architecto",
    "phone": "architecto",
    "email": "architecto",
    "website": "http:\/\/bailey.com\/",
    "facebook": "http:\/\/rempel.com\/sunt-nihil-accusantium-harum-mollitia",
    "twitter": "http:\/\/www.considine.com\/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem",
    "instagram": "http:\/\/www.dare.org\/iure-odit-et-et-modi-ipsum-nostrum-omnis",
    "youtube": "http:\/\/mclaughlin.info\/dolores-enim-non-facere-tempora",
    "soundcloud": "http:\/\/www.leffler.info\/quis-adipisci-molestias-fugit-deleniti-distinctio-eum",
    "spotify": "https:\/\/nitzsche.net\/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTagencies--id-">
</span>
<span id="execution-results-PUTagencies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTagencies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTagencies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTagencies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTagencies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTagencies--id-" data-method="PUT"
      data-path="agencies/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTagencies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTagencies--id-"
                    onclick="tryItOut('PUTagencies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTagencies--id-"
                    onclick="cancelTryOut('PUTagencies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTagencies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>agencies/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>agencies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTagencies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTagencies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTagencies--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the agency. Example: <code>4</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>zip</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="zip"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>state</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="state"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTagencies--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="PUTagencies--id-"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>facebook</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="facebook"                data-endpoint="PUTagencies--id-"
               value="http://rempel.com/sunt-nihil-accusantium-harum-mollitia"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://rempel.com/sunt-nihil-accusantium-harum-mollitia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>twitter</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="twitter"                data-endpoint="PUTagencies--id-"
               value="http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.considine.com/provident-perspiciatis-quo-omnis-nostrum-aut-adipisci-quidem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instagram</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instagram"                data-endpoint="PUTagencies--id-"
               value="http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.dare.org/iure-odit-et-et-modi-ipsum-nostrum-omnis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>youtube</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="youtube"                data-endpoint="PUTagencies--id-"
               value="http://mclaughlin.info/dolores-enim-non-facere-tempora"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://mclaughlin.info/dolores-enim-non-facere-tempora</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>soundcloud</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="soundcloud"                data-endpoint="PUTagencies--id-"
               value="http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.leffler.info/quis-adipisci-molestias-fugit-deleniti-distinctio-eum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spotify</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="spotify"                data-endpoint="PUTagencies--id-"
               value="https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://nitzsche.net/aliquam-veniam-corporis-dolorem-mollitia-deleniti-nemo.html</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEagencies--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEagencies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/agencies/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/agencies/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEagencies--id-">
</span>
<span id="execution-results-DELETEagencies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEagencies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEagencies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEagencies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEagencies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEagencies--id-" data-method="DELETE"
      data-path="agencies/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEagencies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEagencies--id-"
                    onclick="tryItOut('DELETEagencies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEagencies--id-"
                    onclick="cancelTryOut('DELETEagencies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEagencies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>agencies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEagencies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEagencies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEagencies--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the agency. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETavailablemusicians">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETavailablemusicians">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/availablemusicians" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/availablemusicians"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETavailablemusicians">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlBrc0RCV0JmUGczNDBDdFI2UytWRnc9PSIsInZhbHVlIjoid01TeVhvenVCOFZ3ZFcrNTlCTHZvdno0N2ZCNlFzMXB4dXhRck1RVHdQbTUrM2IydXY1NGpwT2ZYWXdZbHQ2WWRBeTN0cmo2cnh1V20xRXNLaDhtSk5zaXo1RnUwNndrSzUyMEZJWExFcDFJV2xpWWxpOW9Dd3Z4RHl1YUlFYXYiLCJtYWMiOiJlNmIzMDU0ZDA4ZWM1NzcyMzg4MTBhZWVlZjllODkyYmMxYmE0YTk0NjU2ZjRhZGFiMmQ0Yjg4ZTBlODYyNmYyIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlloSXJSQ0d1c0FXMnNkcnd3emFPUkE9PSIsInZhbHVlIjoibTkwMklQU29QWVFRa0trNklNN0YrMlF5ZkdHVEVOL05SNjhYU0tWa0cwaW1BblhKTWlkWGZzNmgxNnpzNDRVdngwdklraFZ1cWVlTnBjT09kVDhUSFcybkR5L3ByYzBtR3ZQTXQ5a3BUTnR1RVhMcG96UjBmRkZVeEdxNzZyN0IiLCJtYWMiOiI0MDczMTY3MTcyMTU5Yjk1YWZkY2E1NDRjYzFlOTA4YjhjOTlmMzI3NzhhMTM2Mjc1YzdmMjY4ODExNDdiYzVmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETavailablemusicians" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETavailablemusicians"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETavailablemusicians"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETavailablemusicians" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETavailablemusicians">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETavailablemusicians" data-method="GET"
      data-path="availablemusicians"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETavailablemusicians', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETavailablemusicians"
                    onclick="tryItOut('GETavailablemusicians');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETavailablemusicians"
                    onclick="cancelTryOut('GETavailablemusicians');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETavailablemusicians"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>availablemusicians</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETavailablemusicians"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETavailablemusicians"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETavailablemusicians-create">Show the form for creating a new resource.</h2>

<p>
</p>



<span id="example-requests-GETavailablemusicians-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/availablemusicians/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/availablemusicians/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETavailablemusicians-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjdUS1dxQnFGZWxqTjNmMUwyQkJvdVE9PSIsInZhbHVlIjoieXBkeGJNSExpV2t2dTFqQVhUVnlvMEFROGRNL3R4ckRWa0ZWRnNFRHptb2tGSTU3KzRveDhwU3plM05pZ0RXckx3RForNTNXVWd0R3NrYWpuQmhqSDZBdEhCWVpPckJCWUtIdGhaOXVpb0ZpbGV5NzFSMDQ5U0hrUUsrUTdGSEEiLCJtYWMiOiIwNTg5NzFmZWM2YTVjOWYwNTdiZmM3ODM0NzNlNjI1MDM2MzY4ZWZkNzMwMWQ5OTlmNTM0OGQ3NjgyMmZmMTU1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ims4OXJjSzRlQmZxT0ZpMjlxTW0yRHc9PSIsInZhbHVlIjoiUEMwQytZWU50V3d2Nm1YR1ZuUXVQSHp4b3M5MngzV2FrV3d2QVljRXdjZy9GME5sbHdjVWNPaWFKZUJrb1MzaXBNSjBPZmtPN2N5eGF5RExQcDhDbDB5aGNzNFEyTHBMbGcwNk5RMkVabG1rUThCdDJXM2xLNmJTZThjMXFwWWsiLCJtYWMiOiIzOTJhNjU2YzQ4N2Y0ZTkzYjM4YmRiY2MxYWM4MTYyMzBiOGJmOGZmMjI4YmNjNTJkMDEzMWM5NjYyNzJiYjNmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETavailablemusicians-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETavailablemusicians-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETavailablemusicians-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETavailablemusicians-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETavailablemusicians-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETavailablemusicians-create" data-method="GET"
      data-path="availablemusicians/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETavailablemusicians-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETavailablemusicians-create"
                    onclick="tryItOut('GETavailablemusicians-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETavailablemusicians-create"
                    onclick="cancelTryOut('GETavailablemusicians-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETavailablemusicians-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>availablemusicians/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETavailablemusicians-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETavailablemusicians-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTavailablemusicians">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTavailablemusicians">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/availablemusicians" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"instrument_id\": \"architecto\",
    \"genre_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/availablemusicians"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "instrument_id": "architecto",
    "genre_id": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTavailablemusicians">
</span>
<span id="execution-results-POSTavailablemusicians" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTavailablemusicians"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTavailablemusicians"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTavailablemusicians" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTavailablemusicians">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTavailablemusicians" data-method="POST"
      data-path="availablemusicians"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTavailablemusicians', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTavailablemusicians"
                    onclick="tryItOut('POSTavailablemusicians');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTavailablemusicians"
                    onclick="cancelTryOut('POSTavailablemusicians');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTavailablemusicians"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>availablemusicians</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTavailablemusicians"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTavailablemusicians"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrument_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrument_id"                data-endpoint="POSTavailablemusicians"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>genre_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="genre_id"                data-endpoint="POSTavailablemusicians"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETavailablemusicians--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETavailablemusicians--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/availablemusicians/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/availablemusicians/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETavailablemusicians--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ik9Ha1JXRFkrQ1k4S0tCRmNPY01YU2c9PSIsInZhbHVlIjoiMEFGS0VPSklqZHpFQzNzV2k0S0Q2ME9GTi9KTFN5eXFQYk9NZHh4MTY3Ry9RSUlzVVVvQm1KaVhFSDBaQkhUYzFXQWdxSUZrQUNKc3FBcUJ6VHBYdGxiTXJ0OG9QVHZtNVlPaWtZWTM1NmRYM3djRnl5anArcmtiN0RUVERnNzMiLCJtYWMiOiJlOWY0Y2ExNzg4ODFlMmUwMjI0MTBiNWM1YzM2NDhiYWUyODZiZWExZjcxY2Y2M2M0NzY4MjcwYTE4NWQ0NWZkIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImhNOThxQVgwbzdUTHdOQk5jd0NMU0E9PSIsInZhbHVlIjoiVUNGWGduTG5YT21WSzF0aGpidS8zOFJiL1BXNk9jOFRUN1EvcEhUQWdGc1FhNjFzcU5FSXZ0SkRvaHlXV0kvSDduUjZ2TWF4bG8yV2o2N0MzbkNoVHhzYmR4bitsYy9SdlI5MU5ER3UxcXd6QVoyemM1U2NJbnZSclFldXJJaU8iLCJtYWMiOiJjOTdkM2RkZjQxOGNkZjc3MzkwN2JkZjA1ZDk3MzM0ZjZkZjNlZTgxMDA1Mjc0NzMwZDBlOTY5ZGJlYzcxYWJmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETavailablemusicians--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETavailablemusicians--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETavailablemusicians--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETavailablemusicians--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETavailablemusicians--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETavailablemusicians--id-" data-method="GET"
      data-path="availablemusicians/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETavailablemusicians--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETavailablemusicians--id-"
                    onclick="tryItOut('GETavailablemusicians--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETavailablemusicians--id-"
                    onclick="cancelTryOut('GETavailablemusicians--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETavailablemusicians--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>availablemusicians/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETavailablemusicians--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETavailablemusicians--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETavailablemusicians--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the availablemusician. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETavailablemusicians--availablemusician_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETavailablemusicians--availablemusician_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/availablemusicians/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/availablemusicians/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETavailablemusicians--availablemusician_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjRNRDJ6Z3BTMENPdXhQMStUVXJoekE9PSIsInZhbHVlIjoiWE02Z3Y4RW1rRVlmc0dLODA3RnUvRTEvSVNkbkI2V1NXVm1EZlZCK1FPWDNJdE9JYmFxcFpZV3ZIKzUzVHZRRnROaUErdkpOVlY2Y1BoTFZEcWg4ZEZWcFVBUVg1dzExQTh5MWZaRjRaSHJ6WHVnZHBaTitCTTcwUTBFMUJUOXQiLCJtYWMiOiIyMmZlOGNiYWY0NWI1YmJjNjBmMGYwYTg0M2U4MjZhZTIyMzgwNGFhMGM1N2VjMmJmMThiY2I0MGFlOTZmYjAxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InhGT2Z0aytxaTJZYUVpUDVoOTkrb3c9PSIsInZhbHVlIjoiS3lnUEtNMjdOWkdWdEpvTWlwK0xyTXMzU3d0SGt2bEJiQWI1Z3VvTUJDNS9DYXl1L2llUnFqc0lGeVMwYy9tV0NSNENhLzEva2x4U3dGampDK1VxYmRsMmh1dDNubUQzUkduZFE2VW4xb3dBRnU4VGJETlRnbGEvMXhLN0l1Ym8iLCJtYWMiOiI3OWYwYzE1OTJhMjBiZDAwMjQ2M2YyN2E0YjE5MDU1NmFiNTE1N2NmMWI5Mjg2YmExNjNhYTFmM2JmZmUxYjk1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETavailablemusicians--availablemusician_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETavailablemusicians--availablemusician_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETavailablemusicians--availablemusician_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETavailablemusicians--availablemusician_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETavailablemusicians--availablemusician_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETavailablemusicians--availablemusician_id--edit" data-method="GET"
      data-path="availablemusicians/{availablemusician_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETavailablemusicians--availablemusician_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETavailablemusicians--availablemusician_id--edit"
                    onclick="tryItOut('GETavailablemusicians--availablemusician_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETavailablemusicians--availablemusician_id--edit"
                    onclick="cancelTryOut('GETavailablemusicians--availablemusician_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETavailablemusicians--availablemusician_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>availablemusicians/{availablemusician_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETavailablemusicians--availablemusician_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETavailablemusicians--availablemusician_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>availablemusician_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="availablemusician_id"                data-endpoint="GETavailablemusicians--availablemusician_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the availablemusician. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTavailablemusicians--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTavailablemusicians--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/availablemusicians/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"instrument_id\": \"architecto\",
    \"genre_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/availablemusicians/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "instrument_id": "architecto",
    "genre_id": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTavailablemusicians--id-">
</span>
<span id="execution-results-PUTavailablemusicians--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTavailablemusicians--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTavailablemusicians--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTavailablemusicians--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTavailablemusicians--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTavailablemusicians--id-" data-method="PUT"
      data-path="availablemusicians/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTavailablemusicians--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTavailablemusicians--id-"
                    onclick="tryItOut('PUTavailablemusicians--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTavailablemusicians--id-"
                    onclick="cancelTryOut('PUTavailablemusicians--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTavailablemusicians--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>availablemusicians/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>availablemusicians/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTavailablemusicians--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTavailablemusicians--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTavailablemusicians--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the availablemusician. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>instrument_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="instrument_id"                data-endpoint="PUTavailablemusicians--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>genre_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="genre_id"                data-endpoint="PUTavailablemusicians--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEavailablemusicians--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEavailablemusicians--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/availablemusicians/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/availablemusicians/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEavailablemusicians--id-">
</span>
<span id="execution-results-DELETEavailablemusicians--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEavailablemusicians--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEavailablemusicians--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEavailablemusicians--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEavailablemusicians--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEavailablemusicians--id-" data-method="DELETE"
      data-path="availablemusicians/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEavailablemusicians--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEavailablemusicians--id-"
                    onclick="tryItOut('DELETEavailablemusicians--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEavailablemusicians--id-"
                    onclick="cancelTryOut('DELETEavailablemusicians--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEavailablemusicians--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>availablemusicians/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEavailablemusicians--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEavailablemusicians--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEavailablemusicians--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the availablemusician. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETmailing">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETmailing">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/mailing" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/mailing"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETmailing">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ikt1bmZKSStnMzNoaWQ0a1pyOEFiY0E9PSIsInZhbHVlIjoiWW5ubXNlV1J2blNzaWFSM21qVTRsSjRTdndXa1ZSbnkyK3hRQXRGSGRrYklPVDVZL2xFaUpZNllqREo0c0VKbkl1N1VobGRXTFV1WWVHeFoxMGpPMTBPdjB0aGl6WThSUlFnWDhnV0xkWHA3czBKaTZJd0RYaW5QL3ZHUWxhbkwiLCJtYWMiOiIwOTQwOGUzYTUxYzJiODYwYzcwOTVkZTg3ZjA2MzExN2Y3OWRlYWRkOGQ3Yzk0NGMzNjlkNmNmMjcyMDQ0MzgxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InpxZVdORTlPRHpyaDJHT21rb2hRdHc9PSIsInZhbHVlIjoiZ0I3TFgxbUlXOG1CcDRWelRlZ252OGZOQlJacDFhZHlTU0pBU3NUYjJ2d2pqTG9XRWNpcVFpUDhraXQ4VWxJbngrT3N4TEgwaldaR3NzUmpheTU5d0U1QVVJd2JWNzh4YStSMGlLYjBrZDgvY0VtMmpQK2lkd21UcDBrVC9HL0YiLCJtYWMiOiJjZjQyYzY1MTMwMmY5ZTdiYThmMDJlNWVlMzI3MDA2MTU4NzEzNWM2ZjBiNWEwYjZlZjAyODAxNTljZDg0YjdmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETmailing" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETmailing"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETmailing"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETmailing" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETmailing">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETmailing" data-method="GET"
      data-path="mailing"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETmailing', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETmailing"
                    onclick="tryItOut('GETmailing');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETmailing"
                    onclick="cancelTryOut('GETmailing');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETmailing"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>mailing</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETmailing"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETmailing"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETmailing--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETmailing--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/mailing/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/mailing/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETmailing--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlNZMmFPZjRJUmQzT2ZYd1RQNXZleGc9PSIsInZhbHVlIjoicFFITXZTeExyZG1kTUZCeTRBNWk5emxreTZpaGppV2pndmJGRGRTSHhLNUVKU09wQ3pGZk8zbE9PZk5pQjZpR0hDSkIvQTNVcUVPWGlrVDdSaGdCRjE3c2NnYXc0YUJGUlFZU0U4UlZ0MmdOMDZZN2psak4zMFJlVW5SNm1sNUciLCJtYWMiOiIyYWNkZGMxMzkxNWVkYmE0YWMzNGEyOWNlMjc2NDE0NDEwZWVmNDNjNzA5MTQyOTZiZmU4YzM3ZGQwM2QwZjBlIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IktSVjFGTEdhZ0FtMTZHZUhhSzBQRUE9PSIsInZhbHVlIjoiejI1aEpwWmZvclc2Y0RnMThxUHltUWpiU24zVGpWM2pNSm5hdGc5Y3U0T3FNTmV6eER0T3NLK2VIeGhLR1hDWndFenJTaFBsZXZ5WHh6Y2ptT1RWdk0zenNVcHQxSmlCMHlvTjZRRjl5dGIrdDRWZVBYZ0pUNXd5MDRtbmRxY0UiLCJtYWMiOiI5MDUzMzU5NDQyNmUxYWRlOThlNzBkNzU4ZWZhNGRiNDQ1M2MzMmVlOWVmY2Q4OWJkYzE1MzY2YzcwNTU4M2VmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETmailing--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETmailing--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETmailing--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETmailing--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETmailing--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETmailing--id-" data-method="GET"
      data-path="mailing/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETmailing--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETmailing--id-"
                    onclick="tryItOut('GETmailing--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETmailing--id-"
                    onclick="cancelTryOut('GETmailing--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETmailing--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>mailing/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETmailing--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETmailing--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETmailing--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the mailing. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETstatistics-chart1">Generates chart data for monthly uer registrations.</h2>

<p>
</p>

<p>This function creates and returns data that can be used to generate a chart
representing the number of users registered for each month.</p>

<span id="example-requests-GETstatistics-chart1">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/statistics/chart1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/statistics/chart1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETstatistics-chart1">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IndhWG51QTJZZjFDTzRQN05FTkprY2c9PSIsInZhbHVlIjoiTitVT2huVW1NVFo1VU9tOTNiVEw3Y0cxd1J6U0d6VkQzVEZrSkpxTlprenVoWGpZbG12NnNKSm8rQXFXYkVHSmg0MlBZQVcrdkVvRGJ1SHRHeWZFMzJKSzVIckdxSEs5Q2xiQ25jQjZ5ZHY5R1RrZU9CQlNCSDhxREVlY2FWa24iLCJtYWMiOiJkMTBjZDViY2E4N2M4ZDVkOThhNjBhYWMwZTAwYjAzMTI4MzVmMTE0NjkzYzg2N2I3NDRlZjY0ZjljMDY5NTM0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IndiSVdLUUYyaHdFbUcyZWlVbEVkZGc9PSIsInZhbHVlIjoiUEpwM2FPdkY5ano0ZzBjWGtZQ2t4N2R6YlJtbzd0bG83b2pHTy8wbnhMbWJubnlycUpKKzNSUnBKa0U2VGNncldnTzVFSkF4OWgxWCtkbTYvNkRCTGliKy8xMFZGWUxncGZDUXlYTGRHMFdNejcyVE5KWmIyTzU3cStVV1UwcUYiLCJtYWMiOiI4Y2RiNGQzOTgwYjI5ODY1YmJlNTlmMzQ1ODY5N2ZlYjE0Njc2OTFiMzA2YWU5NWRlMGIzM2VjZTQwOWI1NTE0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstatistics-chart1" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstatistics-chart1"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstatistics-chart1"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstatistics-chart1" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstatistics-chart1">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstatistics-chart1" data-method="GET"
      data-path="statistics/chart1"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstatistics-chart1', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstatistics-chart1"
                    onclick="tryItOut('GETstatistics-chart1');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstatistics-chart1"
                    onclick="cancelTryOut('GETstatistics-chart1');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstatistics-chart1"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>statistics/chart1</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstatistics-chart1"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETstatistics-chart1"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETstatistics-chart2">Generates chart data for vacancies per instrument</h2>

<p>
</p>

<p>This function creates and returns data that can be used to generate a chart
representing the number of vancaies per instrument.</p>

<span id="example-requests-GETstatistics-chart2">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/statistics/chart2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/statistics/chart2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETstatistics-chart2">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InJzeXk4clhCbDBLVWlHTkpIWWFJSUE9PSIsInZhbHVlIjoidzZhZWhCcjZ3cFhUWDl4NjBOQUlYaGZvLytYOFhLZXE2YkZFRGdhWkg5OVZqeEZpZ2dDTVZmR2NHb0FpTkRWeWtMOG9tZU53eU14N2wzbGtnT3J2QmxNOUlWNmdPTWxtNHR2bE1EaDJsdjdIUEtrb3ZHSDhhMUt0c3FmSnZhcnQiLCJtYWMiOiIyMDM1NGVhODgyNTEwMDQ3NDJiNzBlNWFlOTliMmM0ZTQ1YTkyMTg3YjU1MTRhYWY5Y2I4ZmU2ZDhlMjQ5ZmExIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Ii9ZZ2U0akUzdHU4cWh2TUZva2dDNVE9PSIsInZhbHVlIjoidEpXWDBmbU9IWi82NEsyKy9JSVAxckNCQldtMCsyZDl3ejZVeGNIYnUyYVdLeGNvbWJCNU5WQ1NWU0QxUmN6eXppd3NNVEtkM2QrNzU2TFVHemVKTHhqQ0Q2MHp4ZkNGOGw2V0gzc2lCUUdkNXNPL0NJOVgwNG9zU0xRczFMZVkiLCJtYWMiOiJkMDBjOTk2MGNlNDA4MTIxODliNmUyODc4ODdiNDhlOTI5MWQ0Mzk4NDdhYWRjMWE3MmIzMzllZTFiZDYyZTU4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstatistics-chart2" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstatistics-chart2"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstatistics-chart2"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstatistics-chart2" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstatistics-chart2">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstatistics-chart2" data-method="GET"
      data-path="statistics/chart2"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstatistics-chart2', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstatistics-chart2"
                    onclick="tryItOut('GETstatistics-chart2');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstatistics-chart2"
                    onclick="cancelTryOut('GETstatistics-chart2');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstatistics-chart2"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>statistics/chart2</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstatistics-chart2"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETstatistics-chart2"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETstatistics-chart3">Generates chart data for monthly act registrations.</h2>

<p>
</p>

<p>This function creates and returns data that can be used to generate a chart
representing the number of acts registered for each month.</p>

<span id="example-requests-GETstatistics-chart3">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/statistics/chart3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/statistics/chart3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETstatistics-chart3">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlpOTmxHaVJNNVZGK2xFUUNiNmY1ZVE9PSIsInZhbHVlIjoielJUb0xGTG8yZDFmSU9kYklWL2F0cnB1UzVtS2F5VnhjYmh3SkY3alkwdmhNa2tZV2RpdFN2MXZiMU1xcU0wYjl6SlZZK3pveDR2UGJPcFlSNW5CZ1JzbzltdE52TXdXRk5IQ0dpV1Y5bXBFeGtRWThkbUJqNUNMYmhTR0tGM1YiLCJtYWMiOiJjMThmMTU5ZDQzZjczMjk0ODExYjcxMWRjOTQyYjE5NjYyYWIwMzAxZDY2OTFmYTdkYWQ0NjcyNGFhYTk5NDUzIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlJpNWFsdmluemgvNGQ4SHNZL1lFUmc9PSIsInZhbHVlIjoid1EwSFBJL0tYWWxMcU5BTXJmWVM3TENQWGFyOEU3TGdRZGVjWVJXVzZaSElEelNtWFdubDN2cDRiZVZKWE82cVF2WFp2WnRoMHJnQVR5K2pITHBDdHYxV3JBSXlFWkt1S2ZTWEVGTGFJcENlRDhRanhlbm9zTTE3TmU4QVJRMGwiLCJtYWMiOiI5OTljZTk4NzYwMmZlZmFkYTdiZDE3MGVhYTJmYzRlZjRmMGU3NjQxNjVjYWYxZjNkNjBiMmZhY2QxNGFhZTY1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstatistics-chart3" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstatistics-chart3"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstatistics-chart3"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstatistics-chart3" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstatistics-chart3">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstatistics-chart3" data-method="GET"
      data-path="statistics/chart3"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstatistics-chart3', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstatistics-chart3"
                    onclick="tryItOut('GETstatistics-chart3');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstatistics-chart3"
                    onclick="cancelTryOut('GETstatistics-chart3');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstatistics-chart3"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>statistics/chart3</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstatistics-chart3"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETstatistics-chart3"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETstatistics-chart4">Generates chart data for available musicians</h2>

<p>
</p>

<p>This function creates and returns data that can be used to generate a chart
representing the number of available musicians registered for each month.</p>

<span id="example-requests-GETstatistics-chart4">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/statistics/chart4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/statistics/chart4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETstatistics-chart4">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImJFZHF1RXIvd2cwVjI2NWIvSTdvNXc9PSIsInZhbHVlIjoiSklpSzlQcWl6aDcrNG9YR3NObG1nUC9RbEp4eFhPQWY3TXplUHVOVE5Na1ZRMHZVZW9yMU5pTm5QT3JMb3NQajlZVi9xYmRIT3EzTEVsbmRVaDlybkpBTlhQTDdUMEZVdzE5VVRmeEUyWW9YeHdlOGdwKzVSQXI5NTBYTjdzNDAiLCJtYWMiOiJlZDc1ZDNhMzRhYTEwNTY4M2MxMjliYjYwYjMwODg1OGNmZDBlNzc4OTNmYWM4ZTU1NGM2MGU0MzY1Zjg5NTIxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImxHMEJ3RzZNUVJhTk5UY2xSc0ZJRUE9PSIsInZhbHVlIjoiVU55NHdUT1NPM3pnazJheEp6cXlkcHg2R2dGdlVCTUEwV3o0WWZBMmE3QzFTMFpXemNmUE9tb3FHOThaSzUvU09xT2s0aEJlSmFXaFBNNnpKM2RvdG5vNjJ3V0sycjJrZVd2dVZYQUJQUkg3Q05SSEFsRUhSamFVUnFoRGo4dUMiLCJtYWMiOiJhNjU4MDQ2NWM5NGYwNzRiYzZlZjUxNDgxMjhiNGMxODNmZDliY2ZmYzI1NTljZTBiOTMwZjdmYjI5ODNjNWM3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstatistics-chart4" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstatistics-chart4"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstatistics-chart4"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstatistics-chart4" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstatistics-chart4">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstatistics-chart4" data-method="GET"
      data-path="statistics/chart4"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstatistics-chart4', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstatistics-chart4"
                    onclick="tryItOut('GETstatistics-chart4');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstatistics-chart4"
                    onclick="cancelTryOut('GETstatistics-chart4');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstatistics-chart4"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>statistics/chart4</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstatistics-chart4"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETstatistics-chart4"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETstatistics-chart5">Generates chart data for available musicians per instrument</h2>

<p>
</p>

<p>This function creates and returns data that can be used to generate a chart
representing the number of available musicians per instrument.</p>

<span id="example-requests-GETstatistics-chart5">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/statistics/chart5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/statistics/chart5"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETstatistics-chart5">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjV6MVBtaFE1VjN1L2F4VVc5SFJYSnc9PSIsInZhbHVlIjoieEhQczBtTVBqVzVhYmFiZ2ZlMWlaa2NWbFBZRENLRnlLeW1vVEZPSHdTNmY1T0NQYUE5TlhyeWVjY3pVTHZZQTZvRjlxYVFxYUpVdnQxSmh6RXJnNFRrTWN5MWRHTmRaK285ay95OUNwVEJOSWJXem45YVJHaGJ6TXZ0Vlh4Y24iLCJtYWMiOiI3NTljM2I2YTQ0NDk5N2EzYzA3NWM0Y2ExODBhNGQ2M2YwZjRiOGZhZGMwZmUyMzIzMDY2YTllNjI4MDJmM2MzIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InhWSFlUL2Fpb2ErQmtqVlhTbWZpSGc9PSIsInZhbHVlIjoiLzFXSmVOdkZSd08zdFNpM2RBRGZZZ3JERW5WUnBSTC9lemRYUG5tSGdTVWdCRElZYTdQVUovVlhRZWZHcFNKT2ZVaUZTaUNnQ1ZvcG1vRmZ6TVBYMitiUFE4amtEK1EwZE5Nb25tNUpncVh5QXV3a0ZocDl4eWdJUmVqbWU2SWciLCJtYWMiOiJjYzkzYzZkMDEwMWRlMTJlYjY1MDY3NDBhMWViODNjMzJkOTI5MGYyYTBmZjRiNTZlYjVhNDZkZmE3OTllN2E4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstatistics-chart5" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstatistics-chart5"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstatistics-chart5"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstatistics-chart5" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstatistics-chart5">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstatistics-chart5" data-method="GET"
      data-path="statistics/chart5"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstatistics-chart5', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstatistics-chart5"
                    onclick="tryItOut('GETstatistics-chart5');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstatistics-chart5"
                    onclick="cancelTryOut('GETstatistics-chart5');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstatistics-chart5"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>statistics/chart5</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstatistics-chart5"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETstatistics-chart5"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-us">Show the about page.</h2>

<p>
</p>



<span id="example-requests-GETabout-us">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/us" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/us"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-us">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjhKRTdQWkVQeEZHZWE0Q3FYNHlFU0E9PSIsInZhbHVlIjoiamh6SXRFOWZGRFFkK1BRQmxLRWpDZEEvSC82QU5OZ05lODhIWHJZQkZtS3hQblFQWDVvT0tLN0JRdENTNDNiVzJXVXBQUXhwTTFUc2lMY2JURUlmQjk2ZFEybGxzaHpPTFplQlNiUVM0eDdXWkRzZGpjNlQyQUREb01nRjlWS0ciLCJtYWMiOiI4OWZlMTI2ODQ3ZmRjYzE1OGY3OWU3M2Y2MmY0YmUwMGFmM2YwYzI1NzAwOTIzZTFhNzQ3YTEwYzNhZjNhMDcxIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IkRYZzhtYnZrdjJiOWtGV0dPV0t6alE9PSIsInZhbHVlIjoiOWVCOWdsNTlQbUlIOGFVMzVIcnRTMDdCdXAzK1A4cktSa3AxRFhxcHpZS2VMWVNDdXlCRWFDOEV0S0hTa3BHTy9rMTlLNnNtV1g4dE95bkhmdGtSbGwxTitxQnJMVnJXWnFQeFBDVnNxdDgyRE5qcHI0WlE4VE1LdmZZcHZYMzciLCJtYWMiOiIwNTZlZmUxM2ZlNWY1YmRmMDUzN2VkMTY5NzZjY2FlMzAzZTEzNDMyYTkyMjcwOTkyMjI4MmMxYzQ4NGVkMmI5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-us" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-us"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-us"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-us" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-us">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-us" data-method="GET"
      data-path="about/us"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-us', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-us"
                    onclick="tryItOut('GETabout-us');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-us"
                    onclick="cancelTryOut('GETabout-us');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-us"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/us</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-us"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-us"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-datausage">GET about/datausage</h2>

<p>
</p>



<span id="example-requests-GETabout-datausage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/datausage" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/datausage"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-datausage">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImE5MWJTYWgrZCtDL0Evc2FxY0hZalE9PSIsInZhbHVlIjoiYjJnYW5OYmpKT1JJUEc0ZzllY0pBOVJlUnMzcFFCaVJkUG1CNGdtY3gxVHF0QW9NZ1dXUVloNUVBQnk5TkUzOUhUZUNiTzRUZFhpRTByMkE5cXMxaldraEpjTjlubWRiWTFzM3E4V2xaQnZuWkNzdVh0bnAvNHhqS3Jaa2h1d3EiLCJtYWMiOiJiNmVhYjNjODQ1ZGZjNTg1Y2EzZDQwMDA3OWI4YWVjZjgwMzJkMjEyNjgyNGUxMDQ4NWJiYWZiZTIxOGI5ZDRkIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InYxWHkwY0pLcDVEQllxVVovK3NQb3c9PSIsInZhbHVlIjoiUVlMQWJ6TUFKeFhCckpzZ2Jud1VDVlVZMVh0a0RzeGliYXhuNm5TTnN3bGd0TzNLSWcxN3NIZzUwL1g5Q1dnbldjWUhld1Q0ZzZtMlF6eDNvengzUUhqNGx4V0ZGUjhPMHFwNG04NU1mSDhDQ1ZybTdFT2xFcW0vR3VRUFZ5V0wiLCJtYWMiOiI5MjZhYmFlYWRiM2E0MzhhMmVlM2FkZDUxNzUzNDMwNTYxMGNkNWZlNWMyY2M2ZmE0OTQ0N2M0YTI3ODFhZDU0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-datausage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-datausage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-datausage"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-datausage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-datausage">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-datausage" data-method="GET"
      data-path="about/datausage"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-datausage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-datausage"
                    onclick="tryItOut('GETabout-datausage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-datausage"
                    onclick="cancelTryOut('GETabout-datausage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-datausage"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/datausage</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-datausage"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-datausage"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-acts">GET about/acts</h2>

<p>
</p>



<span id="example-requests-GETabout-acts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/acts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/acts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-acts">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkNKcGtLekxqZWFIS0luWkwvc21mNXc9PSIsInZhbHVlIjoicG1KSlVoQXlIaVFlQXZ4ZTRDMlhTa1U0SlhSbHJjQmM5U2gzbC92VGF5eEtQVmtCbGg2aGRuTFg4STBJYW9yeUFhMW8xcjU4empsdWladUhXNkpoZkdYTW9tUTEydyt2a0FQZ3FLaTRFWG5vS1g0aWpMRGVMZTlVaWJkaUhTNnYiLCJtYWMiOiI2M2I2OTMzZmZkOTdmMDFmN2YzNTJhZmI1YzZjYzFiZWRjYThiZTU3ZGE5Nzg1NzAwNTZkODllMDNjMzBmMDAwIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Inp5bmE0MmFPRGhQMXcvZ0R5Z1BOU2c9PSIsInZhbHVlIjoiczFjdUVVOUVydDVRVVhWVkFWWWRqSmVyL3E4RXVsc1FrUDZLRU1DZHJrR2djVnRwOUlvUzlEd0hlU1JyNzR2MW9UQmNXR3h4TExDYjQ4cUJxeHFMNkNIVG9tZDhuN3JQWkhrb2Q1K1FNWngyVnFEQzN6TUY5OUVCRFc5bzYrdWciLCJtYWMiOiI4NTg4NDJmMDQ0MWU5YjdlMmZhOGU0OWVmMTUwNWNjYzhkNWNiZWRjODk0Y2VkZjc2NWE0NGI1YWY3MTgwNmM1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-acts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-acts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-acts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-acts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-acts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-acts" data-method="GET"
      data-path="about/acts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-acts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-acts"
                    onclick="tryItOut('GETabout-acts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-acts"
                    onclick="cancelTryOut('GETabout-acts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-acts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/acts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-acts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-acts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-vacancies">GET about/vacancies</h2>

<p>
</p>



<span id="example-requests-GETabout-vacancies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/vacancies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/vacancies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-vacancies">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ilp0M1JSM3VkM0JpZ09yaEVwTWkvRWc9PSIsInZhbHVlIjoiaHpheDdsU0RObWZsSjh3Z1dQaGJyVVBQWHczcmtsMEJnZWlRK3dJVG5GOGk1VjE5MnlzZkp3N0FZTkkvSU93Yk1OWDh0R0RuSVl6YmZHN0Q4SDFwdFNHRmRVSEEzZFFFUDRNQnlQMVc5S01OSTQxZEJtOEZoSzcvaGd6TWx5NTUiLCJtYWMiOiI4OWNmYjRlNWYyNjY1YTkzMjA5NjY3M2Y1MTQ5ZDFkYjQzZGU3NDlhOWQ2MTlmNWIwNmMyNTkzNjZjZjMzNjQzIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IlQzY2t4VTdscCt4WlNkUzQ2elpaaUE9PSIsInZhbHVlIjoibG9JcVIxcUM2VEhzMFUyL3RHWE9kNUppUDhmckRWTVkzZmx0V1hSU2hCQXBxdW9DUk9CNHhzZkRTcGZUbW1TN1Vwc3ZGZjB5ajJNYkJNUVUycWF3cUd0emhMQWxDVXFFNkZlN2JqSlNQTDRYVEhqN1o5aG5KQnk4cW5QZzlBVTkiLCJtYWMiOiJhODNlODM2MWMzOTU3MTA3OGNhNmM5ZDU3NWY2ZDBiZGExNjhkYzQ3NmIzN2FhZGVmMWNiMDNhOTA3YTVhYWQ3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-vacancies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-vacancies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-vacancies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-vacancies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-vacancies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-vacancies" data-method="GET"
      data-path="about/vacancies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-vacancies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-vacancies"
                    onclick="tryItOut('GETabout-vacancies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-vacancies"
                    onclick="cancelTryOut('GETabout-vacancies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-vacancies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/vacancies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-vacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-vacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-availablemusicians">GET about/availablemusicians</h2>

<p>
</p>



<span id="example-requests-GETabout-availablemusicians">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/availablemusicians" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/availablemusicians"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-availablemusicians">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImNXaytrcXhSbnhwTXRCamZrZ2RYSEE9PSIsInZhbHVlIjoiUXZkTzhxTjZqYUZrRll2OFUycWQyZlJYZm45bUF2dHdsUHAvM3Yxb0ZKTEZhTUZSMmFiU1p0bFVtemVTSjdBWWZVcnNvSWxMUmhqeHlnYjQydTFwQ0FZWTlyNi9Xek1CenpuSjNaK0diendOYmsxYWZJNHcvNXNINDkzdyt2YlgiLCJtYWMiOiI5MTY3ZDI3NzEzNzQwOWQyYTMzMWY4MzBiYWRlYTcyYmUxYTE4OGQxYzU3MmVmNmJjN2RiZmU5ZGMzOWM3YjJmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImJmb0xudCttSm9oUkFXUnZmUUd1OGc9PSIsInZhbHVlIjoiZDdVeXdRdlZobXhVMmxwcHM5VmEweWxRMFhwYVdPUE1XOGRQU25seXBvdWg2SXhpekRXOUJxYWRscVBSZXlBdU5EaHlBeVdSc1JVT3BqVlovTXZFci9yY2k4dzArRVF5YnlPN1BiRzRHYXZPcmlDemllazRxNEN0azUyRVZNSFYiLCJtYWMiOiJkNWZiZGQyMDkzOTQ4ZGM1ZTEzNmU1ZDY5ZjZmYTA3ZWJiOTI4NmY3YjZlN2VhMzZiOWFhZGRkYWUzODg2ZmJmIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-availablemusicians" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-availablemusicians"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-availablemusicians"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-availablemusicians" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-availablemusicians">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-availablemusicians" data-method="GET"
      data-path="about/availablemusicians"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-availablemusicians', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-availablemusicians"
                    onclick="tryItOut('GETabout-availablemusicians');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-availablemusicians"
                    onclick="cancelTryOut('GETabout-availablemusicians');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-availablemusicians"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/availablemusicians</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-availablemusicians"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-availablemusicians"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-rehearsalrooms">GET about/rehearsalrooms</h2>

<p>
</p>



<span id="example-requests-GETabout-rehearsalrooms">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/rehearsalrooms" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/rehearsalrooms"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-rehearsalrooms">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjJMMDdyUjQ2NmFJRi9LTUhraGo3S3c9PSIsInZhbHVlIjoia0o0SzcvcGZSU3gzKzI3d01ldFpmL3puZDExdEcvaXlPdkdEVHRvMXVVcEhRY0tWWVpTa0M3WjJwR3JZanNCV2ZwbTBPSDRJR3dmNUUrcFdmOUR6RTN2NzNXOXA0c0pqQWdxYmdFaTJ5dFFYVWdLdFlWNkpmeHNNTVlsMXMxN3ciLCJtYWMiOiI2OTU0M2JhMTA0MjY1N2I4NzliMjYxNmY1MTE4YTJlNGRkMmEwYjQxNjg1N2M0ZjFmZjFjNTM2ZGZiYmZlYzA4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImRJY0xjSlQweEZLWk5rY004MkFmYXc9PSIsInZhbHVlIjoiWjZyWExIdHVVV1E3V0M1Smc1YXpySjY2RGEwMWxJN0Q3UDk1bUJNcnBGdTl3bUljdm1qUGJoaXBDU1YxMDByQmp1S3UzK1ZzTU9XZ0dSL2NteDlqUDBWV205Z3l5WVZaeDdxL2ZwTDd4ZW8zcVdua0dBQWNqeUc5ak50dlFMSEsiLCJtYWMiOiJjNjZkMTIwZGIwMTJkZTA4NzNlMTNmYWVkMmFjNzkzYjk4MzI3OTA4M2MzYWY1OGUzMDgwOGUwMjI2ODBhNTc4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-rehearsalrooms" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-rehearsalrooms"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-rehearsalrooms"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-rehearsalrooms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-rehearsalrooms">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-rehearsalrooms" data-method="GET"
      data-path="about/rehearsalrooms"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-rehearsalrooms', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-rehearsalrooms"
                    onclick="tryItOut('GETabout-rehearsalrooms');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-rehearsalrooms"
                    onclick="cancelTryOut('GETabout-rehearsalrooms');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-rehearsalrooms"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/rehearsalrooms</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-rehearsalrooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-rehearsalrooms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-venues">GET about/venues</h2>

<p>
</p>



<span id="example-requests-GETabout-venues">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/venues" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/venues"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-venues">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImFSd2x6N1pMWkRTeDAvWUR6UUNCTnc9PSIsInZhbHVlIjoiRnNvOEdESUNSRG95bVBaMkhLK3ZhOEpBQ3VxeWEvU2VRVkkybDBHbHNoYytJVFV3d2kzdGh2azNvOFRtRlhQWWw0bzk2aVVhR2tXWjVENXRiOGd0aCtSUzJ1ZC9GczJzR21wR2thZGVoeEFyMDl2QkRPSTN3dmpLbHcrSXBRM00iLCJtYWMiOiI2YTgyNjk1ZWE0MmMwMzI3ZDc1ZDVlZmE4NTIzMjY1MDNjY2NiZjhiOGY3YThkZjgyY2E4MGRhYThkYTVhYTA4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Iks3NFArZGt6SC80dko0dmdrcDArcGc9PSIsInZhbHVlIjoiVGQyVU55ZFBDdlFHRXlkNGFDanVuZit2WkF4bnpnTmYrTTZqTlRJWnROa0VjMWZZVVpNUllRTmFxVWowZ0NFVk5VVFVVTzdQTlArcUhIOU5GNnlyMWNDTE5SSjM5Rnd3c09zUTZqU0g0aDF0WU5SZXpXRllSamJNYmtTOVBTZ1AiLCJtYWMiOiJhOTk2MDQ4YTNmZTZjZDJiZDAzNGE4OTRjMjE0NTI1N2I0MTQwODY0MGYzYzJhODBmYjdkNDUzODZhMWIyYzg3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-venues" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-venues"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-venues"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-venues" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-venues">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-venues" data-method="GET"
      data-path="about/venues"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-venues', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-venues"
                    onclick="tryItOut('GETabout-venues');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-venues"
                    onclick="cancelTryOut('GETabout-venues');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-venues"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/venues</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-venues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-venues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-agencies">GET about/agencies</h2>

<p>
</p>



<span id="example-requests-GETabout-agencies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/agencies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/agencies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-agencies">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Im5zOE1hSzhDVUJGa3NqVnNtTzYvWUE9PSIsInZhbHVlIjoiaWFKU1JOdXBNNmxrTkh1OW92bktaYVhTTlBSdmVaRjBiMmVYc3RMVG5NR0dhaTRoOWp6K2hLWTZjZXR5ajhkZXVRMVAyQ04zdHFoNnBwb2Z4TXVvZzBuUnJhSFp4cGIvaVJvVm5SbE9PMndCaE4zT0pGbDRiY29ZU1VVdWQ4NjAiLCJtYWMiOiJjNzZkMjg5MWMwN2VlNzMyMmU3YWEzNWMzOTJmYTVlYmYxZjQzMWI2NGQwNzgzZmFmOWQ0OGM3N2JkNWVlMTc1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6InIzZU9vNjF1VkZjSVA1QTBBaFYzTWc9PSIsInZhbHVlIjoiMlN4Tk9mT2xsSGtvWVR4VkRLY1JMUlphZ1MySmpwUi9ERTVyZmJrMXBHZjRXMHZ6WGwzT2VWaFQ1OHpNbXpHREN2TWpLZUV5TEQvUHl5U0lPNnB2czYxaTczSElzOE1nT0F6Q3dLeHpPVmYwTHNaMjF3eGVuNndKbWtmOUFLTmciLCJtYWMiOiJlNjliNWY0MGYwOWE4ZTc2YjBlNTYyNTBmNzQ0ZDQyZjAwOGUwMTkzZmVhYzcwYTljMzQ0Y2ZhNmQ4MDRmOWM4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-agencies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-agencies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-agencies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-agencies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-agencies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-agencies" data-method="GET"
      data-path="about/agencies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-agencies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-agencies"
                    onclick="tryItOut('GETabout-agencies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-agencies"
                    onclick="cancelTryOut('GETabout-agencies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-agencies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/agencies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-agencies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-agencies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout-statistics">GET about/statistics</h2>

<p>
</p>



<span id="example-requests-GETabout-statistics">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/about/statistics" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/about/statistics"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout-statistics">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlB0c0UwUllKZGFJYUUreThNdGpiaVE9PSIsInZhbHVlIjoialBJTmk4UUJ1UDRsa2piWkppOUJRTkU5WlFHSUhEUDNEWFF5eDVDVk1VSGxIdmthV0w2U29veWZORkRtQVdXaFBDd05FaXNVcWE1STBSejh3b1N6aC8zL3ZLY3NDWTJwckpLaTF4bW5GQ0xGTzhxa1NSUGpnNHllOG9yRFlaQkoiLCJtYWMiOiI5YmY0MDkxNDliYTljOGI3ZGEyYzZkYWFlNzNhOGUxOGYyMDIxMmM4ZjI4MTFlYWI2NjNlNzM4YjBiNDNmOGQ4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Im41dUFWL0RsSURCcnVGdkplbzhVU3c9PSIsInZhbHVlIjoiYWM0LzN6cFIyNzNJUWlDdG1EYXBGVVFremE1RjNDNWl6VWtGVmhDSW5aTjJwcFovYWFSMGtwY2hNVW1HM1grYWw0dGJxaFdNdmp3M2Qwd3M2cVA0Tk9LeWh0R2lOUzlseHhuejROcUdpYWlpM3pHNkJXeU96YklWSEtodjArTW0iLCJtYWMiOiI0OTJiOGJkYWM4MTgwZmVmMTQ3N2IxNTgyZDExNjc3MzRhODlhNjkyMDhlMGVlM2JmZDhlMzYwZDJhOTQzZDI2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout-statistics" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout-statistics"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout-statistics"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout-statistics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout-statistics">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout-statistics" data-method="GET"
      data-path="about/statistics"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout-statistics', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout-statistics"
                    onclick="tryItOut('GETabout-statistics');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout-statistics"
                    onclick="cancelTryOut('GETabout-statistics');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout-statistics"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about/statistics</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout-statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout-statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser">Display a listing of the users</h2>

<p>
</p>



<span id="example-requests-GETuser">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ik5hbHF5NFVteGxoemFVdnFZSHFOaGc9PSIsInZhbHVlIjoiMjN0bG5FRnY3M3I1Vi9ZNGNBeXVPS1hFSU9WWStOc2s3dCtjZWZhRy82eDFVUWZRVmZ1NTJaSjB4NHhSa2FmckZsMVNpS3BKMGVpTVVKSVVMSnA1bHRBTmUwNjVMV2tyU09RWWlreDN0UzRBcjNaZHQ2c0RLRmIvZm0rVGpZVUEiLCJtYWMiOiIyMzUxMWRlYmQyMGVlZjBjMjI0OWFmN2QxM2U3OGIxMzIzNGEwYTYyNzI0ODljZjZiNTI1MzQ0NDVmYjZiM2E4IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImppSHhuc2YzR2c5cnN0YjNhWXBueHc9PSIsInZhbHVlIjoiaTRobTEzbWc1Z0RycmZvWVZOZFJJU3JZbmFBTGM1TlY4S0tGa3AxbElqVTNEUnVOZFk5cTlBdXNxQlgxUllUVmZ0UUdiajloU3NlK2Y3bzV3K01vN3BCV1B3MHQ1WUVnMk5sVU9aZHoyMVFIa1VPcWN2Q0UyYk1vN29ZRndaUmkiLCJtYWMiOiI2ZWNhYzE2Y2I0N2ViYmY4NDQzOWVhNzEwNzM0NzY4YzJlNWUzMWNjNTNkMzRmODBhMTZjMWEyMDBlNmFjMGY3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser" data-method="GET"
      data-path="user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser"
                    onclick="tryItOut('GETuser');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser"
                    onclick="cancelTryOut('GETuser');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser--user_id--edit">Show the form for editing the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETuser--user_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/user/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser--user_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Imt3ZUxBQzg4bGRJSkZXOFRqckZOb1E9PSIsInZhbHVlIjoieWNyOFdzTlh2SVB3V2ZaczVtT3kxbmxRT2hRMUVGYUYyZndpSEFndXlHRTc3SWh0cTNvRjliQWFZWG9LV2liSU96TzFmcUxQUUY4ckZVV2xGYjQ4anVYYzlSZDZ1RGVLZVhFeWVtK3BocElRUWZ2Q2hXcDZ5T0NZSU5QSUJvb0kiLCJtYWMiOiJmNmU4MzY3ZDk2YjUwYjQ1NTUwOTQ5ZmQ3ZTNiMTk0OTNjOTEzZTFiNTBlMGE5YWI5ODNkZDg1MjNiNzZkODFkIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImV6YnhlanJ3KzNwWWxqQVZSR2NLdXc9PSIsInZhbHVlIjoiNDJZbk51QjRGWmxPT1o1WGdvWW0vTnFsQlZyS2x0Sm5RUFJUTzBWVWg1QVd4YXFHRzYrU0pUM0wwc1ZhZkJhTkZqYXNLRDlRbW9zZmFPZmkwTWdxblhPcktsQTllVjZLdGNkK1VsOGt4NXJtT3VpVDBLNnZpL3VFRFVmQ1JnNW0iLCJtYWMiOiJhMzdhNTJjZjAyNGIzNmE1MTNhMzMzM2ZjMzQ5N2MwMTlmMmZhMmQ1MzgzZDBlNjczNjBkNTgwOTM2YzY1NGI2IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser--user_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser--user_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser--user_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser--user_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser--user_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser--user_id--edit" data-method="GET"
      data-path="user/{user_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser--user_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser--user_id--edit"
                    onclick="tryItOut('GETuser--user_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser--user_id--edit"
                    onclick="cancelTryOut('GETuser--user_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser--user_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user/{user_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser--user_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser--user_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETuser--user_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTuser--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTuser--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/user/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTuser--id-">
</span>
<span id="execution-results-PUTuser--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTuser--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTuser--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTuser--id-" data-method="PUT"
      data-path="user/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTuser--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTuser--id-"
                    onclick="tryItOut('PUTuser--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTuser--id-"
                    onclick="cancelTryOut('PUTuser--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTuser--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>user/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTuser--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTuser--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTuser--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEuser--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEuser--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://www.bandmate.online/user/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/user/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEuser--id-">
</span>
<span id="execution-results-DELETEuser--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEuser--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEuser--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEuser--id-" data-method="DELETE"
      data-path="user/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEuser--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEuser--id-"
                    onclick="tryItOut('DELETEuser--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEuser--id-"
                    onclick="cancelTryOut('DELETEuser--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEuser--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEuser--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEuser--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETprofile">Show the form for editing the profile.</h2>

<p>
</p>



<span id="example-requests-GETprofile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETprofile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjNXTDN2VGx0Yzd2ZFUzSzV1VkpLNGc9PSIsInZhbHVlIjoidkwrdDZUYkMrY1ZWQnRXMjRjSm5nd252MDNFNU5reWtDZ1djaDBOMWplemRnT3RoYTJBakJaZVVnWTZWU1lHTjVQMlZ4eVNXUlpDN1YxMklHOEJPQjNaZGt5NHozOWVCNUJuNGZ4OHhnZUVZQ1p6UmNTblM5TG8wcmF6WGgxK0MiLCJtYWMiOiIyNTliZmE1MzU0Y2NmNzBhYjc5OTQyN2JkOTI1ZTE1Mzk5OWU1NmY1NzEwMzhkN2E5ZDVjZDViMGE3ZmI4MzFkIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IkpsMkdsMk8xMnJaakhQNVhwSW1IaGc9PSIsInZhbHVlIjoiSHhDbnB6YTJVZGRMTk0vb0wyKzJqS0lTR3FsMVd6aGhnMjlCcWlLY3hEQkdQQkVGNzdGdnUvMGQzRVNBLzhWb21Na1BCbGV4RStuRS80dENpd2h4TFF5RVJoQkJzL1lkWnJEbDUrRHNPSU5MNWhwVGpTcStNRXkwY1MyVEg0dFoiLCJtYWMiOiI3NGI3ZGI2MGRiYzY3Y2Q2NDU4MjU5NDM1ODI3MDIyNWVhNGY1MjBiOGU4NzNmZTE4YWNjMmEwNzhjYzMyNzhiIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETprofile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETprofile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETprofile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETprofile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETprofile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETprofile" data-method="GET"
      data-path="profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETprofile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETprofile"
                    onclick="tryItOut('GETprofile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETprofile"
                    onclick="cancelTryOut('GETprofile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETprofile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETprofile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETprofile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTprofile">Update the profile</h2>

<p>
</p>



<span id="example-requests-PUTprofile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://www.bandmate.online/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn\",
    \"email\": \"libby.bradtke@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn",
    "email": "libby.bradtke@example.com"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTprofile">
</span>
<span id="execution-results-PUTprofile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTprofile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTprofile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTprofile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTprofile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTprofile" data-method="PUT"
      data-path="profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTprofile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTprofile"
                    onclick="tryItOut('PUTprofile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTprofile"
                    onclick="cancelTryOut('PUTprofile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTprofile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTprofile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTprofile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTprofile"
               value="bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn"
               data-component="body">
    <br>
<p>Must be at least 3 characters. Example: <code>bngzmiyvdljnikhwaykcmyuwpwlvqwrsitcpscqldzsnrwtujwvlxjklqppwqbewtnnoqitpxn</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTprofile"
               value="libby.bradtke@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>libby.bradtke@example.com</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETeditpassword">Show the form for editing the profile.</h2>

<p>
</p>



<span id="example-requests-GETeditpassword">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/editpassword" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/editpassword"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETeditpassword">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImdLZzhrYkNJSHdNKyt3aXFUU0xLT2c9PSIsInZhbHVlIjoibnFOZ3dsRFhHeFd2alVzb1ZVT3dQWVFqa2p1VUtmM0tsdXBZR2NhRGQ0OS9OT0NuZitEV2FhdFR5ODFDaXdIcERKYVgxSGhtTTRlK1FnNkR1MjlpSVFseVFJbWFVK1dueE5vN2o2S2t3UzVtU0h1aTlRTFliamFTZ0xuUmxhL3UiLCJtYWMiOiI2ZGVlNzEzOWZhYjg1NGVhMTQ0ZWI0NWNmMzVjZTNhNGY5ZDQ2ZGQ2NWNhN2ZkNWI5MWVkMTNjNjUzZGQ0NmI3IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6Im1OU2F4eWFzenRJbTJaYjNoWlJrb0E9PSIsInZhbHVlIjoiR0hncGcrci8zMGJqTTltSzhYTnNweDl6RkhNMm1Ud0syYnhRZWFpOEtNWjgzWFExcXdHWU5lV0RBVDhEMWVaWUN2dVZZcDVyVWdJY1EwdGhjZEkweHNubWdDWDdjR1hFU0FKYXVoaGxFUHVUWW43SDA1T1VpY013V1dpNDRHZG0iLCJtYWMiOiIxMTNlNDUyY2FjYmM4NTI1MDg0YjhjZjIyYTMxNmE0YTZjZTU4MWYxY2QwMzI1YjEwN2VhZDI4ZDk1ZWJiMzA5IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETeditpassword" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETeditpassword"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETeditpassword"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETeditpassword" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETeditpassword">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETeditpassword" data-method="GET"
      data-path="editpassword"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETeditpassword', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETeditpassword"
                    onclick="tryItOut('GETeditpassword');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETeditpassword"
                    onclick="cancelTryOut('GETeditpassword');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETeditpassword"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>editpassword</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETeditpassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETeditpassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETupdatepassword">Change the password</h2>

<p>
</p>



<span id="example-requests-GETupdatepassword">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/updatepassword" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"currentpassword\": \"bngzmiyvdljnikhwaykcmyuwpw\",
    \"newpassword\": \"lvqwrsitcpscqldzsnrwtujwvl\",
    \"confirmpassword\": \"xjklqppwqbewtnnoqitpxntltc\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/updatepassword"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "currentpassword": "bngzmiyvdljnikhwaykcmyuwpw",
    "newpassword": "lvqwrsitcpscqldzsnrwtujwvl",
    "confirmpassword": "xjklqppwqbewtnnoqitpxntltc"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETupdatepassword">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlBNSHNsZ2F2SDZrYnJqY2Q2bjRxaFE9PSIsInZhbHVlIjoiZnhkWDhmWG9RTXYzTjZKMzkvQ1R4bVFzTVRXc21TblpzZWlYZmJ0NTNLV2RNRmlyeHNnZFRuYm12R0RGMDNuRzRoSVByQTRhckJ5ajRoUnZRaW1FdjZTbm1EVnJhRnppNTByRHErNlZoWnhzSlE5dCswYXVKQklLZGJiSTM4dzIiLCJtYWMiOiJhNzk3MzI3YzRhOTU2OTM1MDc5MjU3MmI2NzQ4NTQ5MTcxNDJkMmQ0NTA3YmU1YjE3ZWRkNTIyMDk3MWM5NWQ0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6ImZKV0lOM25UQWgveTdpYnN4cGM2OWc9PSIsInZhbHVlIjoiRDNOVWNpTHNXR3ZLM0NhOTE0SGQ0dUNHUCs2Q3diT2xYdHZXd0gwL2VwZjI3bEtGcmlJUjBxazNzQlVqcnk0UUJYNnJrNStmVmZPM1pDZ0pac2ZiTm5qYm54Um5TeWMzT3hDMUIybFRNZ0JJMzJYM0x2QnBCaE5NN2p2LzFaZlMiLCJtYWMiOiJmZjIyZDZkYjMzZmEyNjU0NzMzY2VmYTU5ODZhYTE2YjU2MWVmMjY3MDg4ZTIwOGY0NDVlY2M3MjU5NmRjNjE1IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETupdatepassword" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETupdatepassword"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETupdatepassword"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETupdatepassword" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETupdatepassword">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETupdatepassword" data-method="GET"
      data-path="updatepassword"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETupdatepassword', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETupdatepassword"
                    onclick="tryItOut('GETupdatepassword');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETupdatepassword"
                    onclick="cancelTryOut('GETupdatepassword');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETupdatepassword"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>updatepassword</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETupdatepassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETupdatepassword"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>currentpassword</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="currentpassword"                data-endpoint="GETupdatepassword"
               value="bngzmiyvdljnikhwaykcmyuwpw"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>bngzmiyvdljnikhwaykcmyuwpw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>newpassword</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="newpassword"                data-endpoint="GETupdatepassword"
               value="lvqwrsitcpscqldzsnrwtujwvl"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>lvqwrsitcpscqldzsnrwtujwvl</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>confirmpassword</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="confirmpassword"                data-endpoint="GETupdatepassword"
               value="xjklqppwqbewtnnoqitpxntltc"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>xjklqppwqbewtnnoqitpxntltc</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETuserdata">GET userdata</h2>

<p>
</p>



<span id="example-requests-GETuserdata">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/userdata" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/userdata"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuserdata">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InBXMDhhOXFudDdmUTU3YkVrUVRWVlE9PSIsInZhbHVlIjoiVVNBTGc4VzRYSHNnK3NMd3NUWFp2anRhVGFQUld0TnQ5TndKN3U1TkFIU0JleUlJN1R1ZUZhU01OeVI2d2MwTEtSclJ0M0lhL2gvQVR6enQzTm9HUlZyRTZ2U0I0cUN3QjBMSVNoME13K2hVRGN6aEd5UzBEUHRsWkNaYmZmV24iLCJtYWMiOiI0NDE3ZWZhODQwNWZhMjE2MTgxN2EyNjM1NTY3YjkzNDBmODNiMmVhMDEwZmEwZGQ5MDc5MGY2ZWE0ZTgyYWJjIiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; samesite=lax; bandmate_session=eyJpdiI6IjJTTDF1THFzSlYzaHVCL1dBSjQ2RUE9PSIsInZhbHVlIjoiS3R6VEsxRWMwSjFpa3dmUEtVeDZZeHl4Q0FmTEN0ME9LSTl1MFZRbmdmQjBqY1RkQ1hwbThxMVI2MkRMZmFPYWRPVEtaMmw1Wm80bWs3NUZBa3BlbzNGQnFybUtxL0M5cE5uUkNPWHdYZE9LazNMcW5zS0IzL1p6UjduWUFPZkwiLCJtYWMiOiIyNDVjMmMyOWU0NDY2ZDczNWI2NDU1MzgyNTFmNTM5OGUzNjZhOTNiYzU4YTY2ODY3OTgzYTRjM2ZiOGNlMjg0IiwidGFnIjoiIn0%3D; expires=Tue, 27 Jan 2026 21:53:34 GMT; Max-Age=7200; path=/; secure; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuserdata" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuserdata"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuserdata"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuserdata" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuserdata">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuserdata" data-method="GET"
      data-path="userdata"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuserdata', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuserdata"
                    onclick="tryItOut('GETuserdata');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuserdata"
                    onclick="cancelTryOut('GETuserdata');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuserdata"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>userdata</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuserdata"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuserdata"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETstorage--path-">GET storage/{path}</h2>

<p>
</p>



<span id="example-requests-GETstorage--path-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://www.bandmate.online/storage/|{+-0p" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/storage/|{+-0p"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETstorage--path-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstorage--path-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstorage--path-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstorage--path-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstorage--path-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstorage--path-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstorage--path-" data-method="GET"
      data-path="storage/{path}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstorage--path-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstorage--path-"
                    onclick="tryItOut('GETstorage--path-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstorage--path-"
                    onclick="cancelTryOut('GETstorage--path-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstorage--path-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>storage/{path}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstorage--path-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETstorage--path-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="path"                data-endpoint="GETstorage--path-"
               value="|{+-0p"
               data-component="url">
    <br>
<p>Example: <code>|{+-0p</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTlivewire-update">POST livewire/update</h2>

<p>
</p>



<span id="example-requests-POSTlivewire-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://www.bandmate.online/livewire/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://www.bandmate.online/livewire/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlivewire-update">
</span>
<span id="execution-results-POSTlivewire-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlivewire-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlivewire-update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlivewire-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlivewire-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlivewire-update" data-method="POST"
      data-path="livewire/update"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlivewire-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlivewire-update"
                    onclick="tryItOut('POSTlivewire-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlivewire-update"
                    onclick="cancelTryOut('POSTlivewire-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlivewire-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>livewire/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlivewire-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlivewire-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
