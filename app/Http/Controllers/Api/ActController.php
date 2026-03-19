<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Act;

class ActController extends Controller
{
    public function index()
    {

        // $acts = Act::paginate(10);

        $acts = Act::all();
        return response()->json($acts);
    }
}
