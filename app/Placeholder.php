<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placeholder extends Model
{
    protected $table = 'placeholders';
    protected $fillable = ['variable_name', 'variable_value'];
}

function userVariables()
{
    return $this->belongsTo('app\User', 'user_id', 'id');
}
