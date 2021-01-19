<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain;
use Auth;

class BuilderController extends Controller
{
    public function showEditor($domain_id = 0)
    {
        $data = Domain::where([
            ['id', '=', $domain_id],
            ['user_id', '=', Auth::user()->id]
        ])->first();
        //dd($data);
        return view('builder', compact('data'))->render();
    }
}
