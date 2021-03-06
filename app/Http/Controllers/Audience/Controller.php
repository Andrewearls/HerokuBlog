<?php

namespace App\Http\Controllers\Audience;

use App\Http\Controllers\Controller as OriginalController;
use Illuminate\Http\Request;

class Controller extends OriginalController
{
    /**
     * Return team homepage.
     *
     * @param Request
     * @return view
     */
    public function index(Request $request)
    {
        // dd('data:image/png;base64, ' . base64_encode(file_get_contents('https://via.placeholder.com/150')));
        // $team = Team::find($teamSlug)->first();
    	// return $teamSlug;
        return view('audience.homepage')->with(['team' => $request->team]);
    }
}
