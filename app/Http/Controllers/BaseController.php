<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BaseController extends Controller
{
    public function __construct()
    {
        // Add data to be passed to all views
        $this->middleware(function ($request, $next) {
            $userAvatar = Auth::user()->getFirstMedia('images/AvatarThumbnailPics');;
            view()->share('userAvatar', $userAvatar);
            return $next($request);
        });
    }

}
