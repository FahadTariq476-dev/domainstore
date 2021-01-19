<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [
        'url'
    ];

    public function analytic()
    {
        return $this->hasMany('App\Model\DomainAnalytic');
    }

    public function domainquery()
    {
        return $this->hasMany('App\Model\DomainQuery','domain_id','id');
    }
}
