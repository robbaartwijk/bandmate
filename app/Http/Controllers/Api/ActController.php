<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Act;

class ActController extends Controller
{
    public function index()
    {
        // FIX: replaced Act::all() with paginate() to prevent returning the entire
        // table in a single response as the dataset grows.
        $acts = Act::paginate(25);

        return response()->json($acts);
    }
}