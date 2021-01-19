<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormTemplate;
use App\Placeholder;
use Auth;
class TemplateController extends Controller
{
    public function __construct()
    {

    }

    public function index($tid = 0)
    {
        $uid = Auth::user()->id;
        //dd(Auth::user()->with('getPHvariables')->get());
        //$data['tempData'] = $tid != 0 ? FormTemplate::find($tid)->toArray() : [];
        $data['all_temps'] = FormTemplate::where(['user_id' => $uid])->get()->toArray();
        
        if($tid == 0)
            $data['tempData'] = [];
        else
            $data['tempData'] = array_values(array_filter($data['all_temps'], function($t) use ($tid){
                return $t['id'] == $tid;
            }));

        //dd($data['tempData']);
        $data['ph_variables'] = PlaceHolder::where(['user_id' => $uid])->get();
        return view('template', $data);
    }

    public function store(Request $r)
    {
        $uid = Auth::user()->id;
        if($r->tid == 0)
        {
            //check if name already exist
            $names = FormTemplate::where(['user_id' => $uid])->pluck('template_name')->toArray();
            if(in_array($r->template_name, $names))
                return response(['status' => 'Failed', 'msg' => 'Template Form Name Already Exist'])->setStatusCode(409);

            $temp = new FormTemplate();
            $temp->user_id = $uid;
        
            $temp->template_code = $r->formJSON;
            $temp->template_name = $r->template_name;
            $temp->save();
        }
        else
        {
            FormTemplate::where('id', $r->tid)
                ->where('user_id', $uid)
                ->update(['template_code' => $r->formJSON, 'template_name' => $r->template_name]);
        }
        return 'Done';
    }

    function showDefault()
    {
        return view('default.index');
    }

    function showT1()
    {
        return view('template1.index');
    }

    function showT2()
    {
        return view('template2.index');
    }

    function delTemp($tid)
    {
        FormTemplate::where(['id' => $tid, 'user_id' => Auth::user()->id])->delete();
        return redirect()->route('temp.index')->with(['success' => 'Form Template Deleted Successfully']);
    }
}
