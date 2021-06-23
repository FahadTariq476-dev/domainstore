<?php

namespace App\Http\Controllers;

use App\Domain;
use App\DomainQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Notifications\Inquiry;
use User;
use function GuzzleHttp\json_decode;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($did = 0)
    {
        $domain = new Domain();

        $uid = Auth::user()->id;
        $data['domains'] = $domain->mydomains($uid);
        $data['did'] = $did;
        $data['f_templates'] = DB::table('templates')->where('user_id', $uid)->get();
        
        $data['found'] = $data['domains']->filter(function($dm) use($did){
            return $dm->id == $did;
        })->values();
        // $data['domain_html'] = Domain::select('domain_html')->where('user_id',$uid)->get();
        // dd($data['domain_html']);
        if($data['found']->isEmpty() && $did != 0)
            abort(404);
        return view('domains', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'domain_url'        => 'required',
            'domain_template' => 'required|in:default,t1,t2',
        ]);

        $uid = Auth::user()->id;
        
        if($request->did == 0)
        {
            $urls= array_filter(explode(PHP_EOL, $request->domain_url), 'trim');
            foreach($urls AS $url){
                if(empty($url))
                    continue;    
                $domain =  new Domain();
                $domain->user_id = $uid;
                $domain->url = trim($url);
                $domain->view_page = $request->domain_template;
                $domain->template_id = $request->form_template;
                $domain->domain_html = $request->domain_html;
                $domain->save();
            }
        }
        else
        {
            Domain::where(['user_id' => $uid, 'id' => $request->did])->update(['url' => $request->domain_url, 'view_page' => $request->domain_template, 'template_id' => $request->form_template]);
        }
        
        //$request->session()->flash('success', 'Domain Added Successfully');
        return redirect()->route('domain.index')->with('success', $request->url.' Saved Successfully!');
    }

    public function preview($did)
    {
        $Domain = new Domain();
        $uid = Auth::user()->id;
        $data['domain'] = $Domain::where(['id' => $did])->with(['domainData', 'dVariables'])->get();
        if($data['domain']->isEmpty())
            abort(404);

        $placeholders = $data['domain'][0]->dVariables()->pluck('variable_value', 'variable_name');
        //return $placeholders['@headline'];
        $data['headline'] = isset($placeholders) && isset($placeholders['@headline']) ? $placeholders['@headline'] : 'Your @headline Goes Here';

        $formTemp = $data['domain'][0]->domainData()->get();
        if(!$formTemp->isEmpty()){
            // return $data['domain'][0]->domainData()->get()[0]->template_code;
            $data['form'] = strtr($data['domain'][0]->domainData()->get()[0]->template_code, (Array)json_decode($placeholders));
        }
        $data['did'] = $did;
        $data['domain_html'] = Domain::select('domain_html')->where(['user_id'=>$uid,'id'=>$did])->get();
        // dd($data['domain_html']);
        // $@mine = 'dd';
        // return $@mine;
        // return $data;
        //return view_file_name($data['domain'][0]->view_page);
        return view(view_file_name($data['domain'][0]->view_page), $data);
    } 
    public function sendpreview($did){
        $Domain = new Domain();
        $data['headline'] = isset($placeholders) && isset($placeholders['@headline']) ? $placeholders['@headline'] : 'Your @headline Goes Here';
        $data['domain'] = $Domain::where(['id' => $did])->with(['domainData', 'dVariables'])->get();
        $placeholders = $data['domain'][0]->dVariables()->pluck('variable_value', 'variable_name');
        $data['did'] = $did;
        $data['domain_html'] = Domain::select('domain_html')->where('id',$did)->get();
        // dd($data['domain_html']);
        // $@mine = 'dd';
        // return $@mine;
        // return $data;
        //return view_file_name($data['domain'][0]->view_page);
        return view(view_file_name($data['domain'][0]->view_page), $data);  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $idate(format)  
     * @return \Illuminate\Http\Response
     */
    public function show($did = 0)
    {
        // echo $id;
        $domain = new Domain();
        $uid = Auth::user()->id;
        $data['domains'] = $domain->mydomains($uid);
        $data['did'] = $did;
        $data['f_templates'] = DB::table('templates')->where('user_id', $uid)->get();
        $data['found'] = $data['domains']->filter(function($dm) use($did){
            return $dm->id == $did;
        })->values();
        // $data['domain_html'] = Domain::select('domain_html')->where('user_id',$uid)->get();
        // dd($data['domain_html']);
        if($data['found']->isEmpty() && $did != 0)
            abort(404);
        $data['edit_id'] = Domain::where('id',$did)->get();
        return view('edit_domains', $data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "this is update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Domain::where(['id' => $id, 'user_id' => Auth::user()->id])->delete();
        return redirect()->route('domain.index')->with(['success' => 'Domain Deleted Successfully']);
    }

    public function query(Request $request)
    {
        /*$search = $request->input('domain');
        $data = Domain::where(
            'url',
            'like',
            "%$search%"
        )->first();*/
        // return response(Domain::where(['domain_id'=>$request->domain_id])->user());
        $query = new DomainQuery();
        $query->domain_id = $request->domain_id;
        $query->query = $request->input('data');
        $query->save();
    }

    public function queryShow($did = 0)
    {
        $uid = Auth::user()->id;
        $data['did'] = $did;
        $data['queries'] = DB::Table('domain_queries')->select('domain_queries.*', 'domains.url')->leftJoin('domains', 'domains.id', '=', 'domain_queries.domain_id')->where(['domains.user_id' => $uid])->orderBy('domain_queries.created_at', 'DESC')->where(['domain_id' => $did])->get();
        $data['email_templates'] = DB::table('email_templates')->where('user_id',$uid)->get();
        $data['placeholders'] = DB::table('placeholders')->where('user_id',$uid)->get();
        return view('domain_queries', $data);
    }
}
