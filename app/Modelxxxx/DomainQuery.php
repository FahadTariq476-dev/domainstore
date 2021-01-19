<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DomainQuery extends Model
{
    protected $casts = [
        'query' => 'array'
    ];
}
