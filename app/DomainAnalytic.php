<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DomainAnalytic extends Model
{
    protected $fillable = ['ip_address','domain_id'];
}
