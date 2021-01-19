<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emailQuery extends Model
{
    protected $fillable = [
   'user_id','domain_id','email_by','email_to','email_subject','message'
];

public function myemaildomains($uid)
    {
        $domains = Domain::select('domains.id', 'domains.view_page', 'domains.url', 'domains.created_at', 'domains.template_id', 'templates.template_name')
              ->where('domains.user_id', $uid)
              ->leftJoin('email_queries', 'email_queries.domain_id', '=', 'domains.id')
              ->get(); 
        return $domains; 
    }
}
