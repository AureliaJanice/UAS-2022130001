<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function __invoke(Request $request)
    {
        $cameras = Camera::paginate(9);

        return view('cameradex', compact('cameras'));
    }
}
