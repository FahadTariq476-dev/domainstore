<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Webbuilder extends Model
{
    protected $fillable = [
        'user_id', 'domain_id', 'code'
    ];
}
