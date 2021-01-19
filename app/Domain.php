<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [
        'user_id', 'url', 'view_page'
    ];

    public function analytic()
    {
        return $this->hasMany('App\Model\DomainAnalytic');
    }

    public function domainquery()
    {
        return $this->hasMany('App\Model\DomainQuery','domain_id','id');
    }

    public function domainData()
    {
        return $this->HasOne('App\FormTemplate', 'id', 'template_id');
    }

    public function dVariables()
    {
        return $this->HasMany('App\Placeholder', 'user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function mydomains($uid)
    {
        $domains = Domain::select('domains.id', 'domains.view_page', 'domains.url', 'domains.created_at','domains.domain_html' ,'domains.template_id', 'templates.template_name')
              ->where('domains.user_id', $uid)
              ->leftJoin('templates', 'templates.id', '=', 'domains.template_id')
              ->get(); 
        return $domains; 
    }
}
