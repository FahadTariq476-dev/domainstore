<?php

namespace App\Http\Controllers;
use App\Domain;
use App\emailQuery;
use App\User;
use App\EmailTemplate;
use App\Placeholder;
use App\Notifications\EmailQueryNotification;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Notifications\Notifiable;
use App\Notifications;
// use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use App\DomainQuery;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Notifications\Inquiry;
use Illuminate\Http\Request;

class EmailQueryController extends Controller
{
    public function email(Request $request,$did)
    {
        $id = $did;
        $request->validate([
            'email_to' => 'email',
            'email_subject' => 'required',
            'message' => 'required',
        ]);
        $email = new emailQuery();
        $uid = Auth::user()->id;
        $uemail = Auth::user()->email;
        $locations = $request->input('email_to');
        $inputsubject = $request->input('email_subject');
        // if ($inputsubject) {
        //     // $variable_name = Placeholder::where('variable_name',$inputsubject)->get();
        //     $inputsubject  = Placeholder::select('variable_value')->where('variable_name',$inputsubject)->first();
        //     // dd($inputsubject);
        // }
        foreach (explode(",", $locations) as $location)
        {
        // $email = new emailQuery();
            $email = emailQuery::create([
                'user_id' => $uid,
                'domain_id' => $id,
                'email_by' => $uemail,
                'email_to' => $location,
                'email_subject' => $inputsubject,
                // 'email_subject' => $inputsubject['variable_value'],
                'message' => $request->input('message'),
            ]);
            $user = Auth::user();
            User::find($uid)->notify(new EmailQueryNotification($email,$user));
            // Notification::send($user, new EmailQueryNotification($email));
        // $email->user_id = $uid;
        // $email->domain_id = $id;
        // $email->email_by = $uemail;
        // $email->email_to = $location;
        // $email->email_subject = $request->input('email_subject');
        // $email->message = $request->input('message');
        // $email->save();
        // $user = User::where('email', $email->email_by)->get();
        // User::find($uid)->notify(new EmailQueryNotification($email['email_subject']));
        // return (new App\Notifications\EmailQueryNotification($email))
        //         ->toMail($email->email_to);
        //    Mail::to($email->email_to)->send(new EmailNotification($email->message));
        return redirect()->back()->with('message', 'Email Has Been Sent');
        }
    }
    public function link($id)
    {
        // dd($id);
        $users = User::where('id',$id)->get();
        $dids = Domain::where('user_id',$id)->get();
        return view('inquire',['users'=>$users,'dids'=>$dids]);
    }
    public function emailTemplate ()
    {
        $uid = Auth::user()->id;
        // $data['placeholder'] = Placeholder::where('user_id',$uid)->get();
        // $placeholder = $data['placeholder']->pluck('variable_value','variable_name');
        // $data['name'] = isset($placeholder) && isset($placeholder['variable_name']) ? $placeholder['variable_name'] : 'Your @name is here';
        // // return $data['placeholder'][0]->get();
        // $data['forms'] = strtr($data['placeholder'][0]->get(), (Array)json_decode($placeholder));
        // return $data['forms'];

        // $data['placeholder'] = $Placeholder::where(['user_id' => $uid])->with(['placeholderData', 'pVariables'])->get();
        // if($data['placeholder']->isEmpty())
        //     abort(404);
        // $placeholders = $data['placeholder'][0]->dVariables()->pluck('variable_value', 'variable_name');
        // $data['headline'] = isset($placeholders) && isset($placeholders['@name']) ? $placeholders['@name'] : 'Your @name is here';

        // $formTemp = $data['placeholder'][0]->placeholderData()->get();
        // if(!$formTemp->isEmpty())
        //     $data['form'] = strtr($data['placeholder'][0]->domainData()->get());
        // $data['user_id'] = $uid;
        $data['placeholders'] = Placeholder::where('user_id',$uid)->get();
        return view('email_template',$data);
    }
    public function getPlaceholders(Request $request){
        if ($request->get('query')) {
            $uid = Auth::user()->id;
            // dd($uid)
            $query = $request->get('query');
            // dd($query);
            $data = Placeholder::where('variable_name','LIKE',"%{$query}%")->where('user_id',$uid)->get();
            // dd($data);
            $output = '<div>';
            foreach ($data as $row) {
                $output .= '<div id="li" data-subjectid="'.$row->id.'"><a >'.$row->variable_name.'</a></div>';
            }
            $output .= '</div>';
            echo $output;
        }
   
        // return response()->json($data);
    }
    public function getPlaceholdersTiny(Request $request){
        if ($request->get('query')) {
            $uid = Auth::user()->id;
            // dd($uid)
            $query = $request->get('query');
            // dd($query);
            $data = Placeholder::where('variable_name','LIKE',"%{$query}%")->where('user_id',$uid)->get();
            // dd($data);
            $output = '<div>';
            foreach ($data as $row) {
                $output .= '<div id="tinyli" data-subjectid="'.$row->id.'"><a >'.$row->variable_name.'</a></div>';
            }
            $output .= '</div>';
            echo $output;
        }
   
        // return response()->json($data);
    }
    public function getPlaceholdersEmailTiny(Request $request){
        if ($request->get('query')) {
            $uid = Auth::user()->id;
            // dd($uid);
            $query = $request->get('query');
            // dd($query);
            $data = Placeholder::where('variable_name','LIKE',"%{$query}%")->where('user_id',$uid)->get();
            // dd($data);
            $output = '<div>';
            foreach ($data as $row) {
                $output .= '<div id="tinyli" data-subjectid="'.$row->id.'"><a >'.$row->variable_name.'</a></div>';
            }
            $output .= '</div>';
            echo $output;
        }
   
        // return response()->json($data);
    }

    public function emailTemplateSave(Request $request)
    {
        $request->validate([
            'template_name' => 'required',
            'template_body' => 'required',
        ]);
        $email_template = new EmailTemplate();
        $email_template->user_id = Auth::user()->id;
        $email_template->template_name = $request->input('template_name');
        $email_template->template_body = $request->input('template_body');
        $email_template->save();
        return redirect()->back()->with('message', 'Email Template Has Been Created');
        // $email->domain_id = $id;
        // $email->email_by = $uemail;
        // $email->email_to = $location;
        // $email->email_subject = $request->input('email_subject');
        // $email->message = $request->input('message');
        // $email->save();
    }
    public function emailTemplatefetch($id)
    {
        // return $id;
        if($id){
            $emailtemplate = EmailTemplate::where('id', $id)->first();
            if($emailtemplate)
                return $emailtemplate->template_body;
        }
        return '';
        // return Response::json($emailtemplate);
    }
    public function emailSubjectFetch($id)
    {
        if($id){
            $emailsubject = Placeholder::where('id', $id)->first();
            if($emailsubject)
                return $emailsubject->variable_value;
        }
        return '';
    }
    public function emailTinyFetch($id)
    {
        if($id){
            $emailsubject = Placeholder::where('id', $id)->first();
            if($emailsubject)
                return $emailsubject->variable_value;
        }
        return '';
    }
    public function TemplateFetch($id)
    {
        if($id){
            $emailsubject = Placeholder::where('id', $id)->first();
            if($emailsubject)
                return $emailsubject->variable_value;
        }
        return '';
    }
}
