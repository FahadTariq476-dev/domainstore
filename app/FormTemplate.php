<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormTemplate extends Model
{
    public $timestamps = false;
    protected $table = 'templates';
    protected $fillable = ['user_id', 'template_name', 'template_code'];
}
