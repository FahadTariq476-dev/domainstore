<?php

namespace App\Http\Controllers;

use App\Domain;
use App\DomainQuery;
use App\emailQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Notifications\Inquiry;
use User;
use function GuzzleHttp\json_decode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($did = 0)
    {
        $domain = new Domain();

        $uid = Auth::user()->id;
        $data['domains'] = $domain->mydomains($uid);
        $data['no_domain'] = $data['domains']->count();
        $data['did'] = $did;
        $data['f_templates'] = DB::table('templates')->where('user_id', $uid)->get();
        $data['email_queries'] = DB::table('email_queries')->where('user_id', $uid)->get();
        $data['no_reply_queries'] = $data['email_queries']->count();
        $data['found'] = $data['domains']->filter(function($dm) use($did){
            return $dm->id == $did;
        })->values();
        $data['placeholders'] = DB::table('placeholders')->where('user_id',$uid)->get();
        $data['queries'] = DB::Table('domain_queries')->select('domain_queries.*', 'domains.url')->leftJoin('domains', 'domains.id', '=', 'domain_queries.domain_id')->where(['domains.user_id' => $uid])->orderBy('domain_queries.created_at', 'DESC')->get();
        $data['no_query'] = $data['queries']->count(); 
        // $data['domain_html'] = Domain::select('domain_html')->where('user_id',$uid)->get();
        // dd($data['domain_html']);
        if($data['found']->isEmpty() && $did != 0)
            abort(404);
        return view('dashboard', $data);
    }
}
