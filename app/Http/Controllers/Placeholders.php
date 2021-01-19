<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Placeholder;
use Auth;

class Placeholders extends Controller
{
    public function index()
    {
        $uid = Auth::user()->id;
        $data['variables'] = Placeholder::where(['user_id' => $uid])->get();
        return view('placeholders', $data);
    }

    public function store(Request $req)
    {
        $this->validate($req, ['variable_name' => 'required', 'variable_value' => 'required']);

        $recs = [];
        $uid = Auth::user()->id;
        foreach($req->variable_name AS $i=>$vname){
            if(!empty($vname) && !empty($req->variable_value[$i]))
                $recs[] = ['variable_name' => $vname, 'variable_value' => $req->variable_value[$i], 'user_id' => $uid];
        }
        Placeholder::where(['user_id' => $uid])->delete();
        Placeholder::insert($recs);
        return redirect()->route('ph.show')->with(['success' => 'Placeholder Variables Saved']);

    }
}
