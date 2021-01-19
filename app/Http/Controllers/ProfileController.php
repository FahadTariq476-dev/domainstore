<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
      // public function __construct()
      // {
      //   $this->middleware('auth:admin'); //If user is not logged in then he can't access this page
      // }
    public function index()
    {
    	$users = Auth::user();
    	$profiles = DB::table('users')->where('id',$users->id)->get();
    	return view('profile',['profiles'=>$profiles,'users'=>$users]);
    }

    public function updateProfile(Request $request , $id)
    {
    	$request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    	DB::table('users')
                ->where('id', $id)
               ->update([
               	'name' => $request->input('name'),
               	'email' => $request->input('email'),
               	'phone' => $request->input('phone'),
               ]);
        return redirect()->back()->with('message', 'Profile Has Been Updated');
    }

    public function updatePassword(Request $request)
    {
         $this->validate($request, [
          'oldpassword' => 'required',
          'newpassword' => 'required|min:8',
          'newpasswordconfirm' =>'required|min:8'
        ]);
 
       $hashedPassword = Auth::user()->password;
 
       if (\Hash::check($request->oldpassword , $hashedPassword )) {
 
         if (!\Hash::check($request->newpassword , $hashedPassword)) {
            if ($request->newpasswordconfirm == $request->newpassword) {
              $users =User::find(Auth::user()->id);
              $users->password = hash::make($request->newpassword);
              User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
              session()->flash('message','Password Updated Successfully');
              return redirect()->back();
            }
            else{
                  session()->flash('message','Please confirm the New Password!');
                  return redirect()->back();
            }
          }
 
            else
                {
                  session()->flash('message','New Password Cannot be the Old Password!');
                  return redirect()->back();
                }
           }
 
          else
              {
               session()->flash('message','Old Password Does not Matched ');
               return redirect()->back();
             }
    }
}
