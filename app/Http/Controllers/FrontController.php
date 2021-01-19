<?php

namespace App\Http\Controllers;
use App\Domain;
use App\User;
use DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $domains = DB::table('domains')->get();
    	return view('Arsha.index',['domains'=>$domains]);
    }
    public function about()
    {
    	return view('front.about');
    }
    public function domain()
    {
    	return view('front.domain');
    }
    public function testimonial()
    {
    	return view('front.testmonial');
    }
    public function contact()
    {
    	return view('front.contact');
    }
    public function owner($id)
    {
        // return $id;
        if($id){
            $user_id = User::where('id', $id)->first();
            if($user_id)
                return $user_id->name;
        }
        return '';
       // $user_id = $id;
       // $data = User::select('name')->where('id',$user_id)->get();
       // return $data;
    }
}
