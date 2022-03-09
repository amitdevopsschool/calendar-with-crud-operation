<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Passport\HasApiTokens;

class Task extends Model
{
    // use HasApiTokens;
    protected $table = 'tasks';
    protected $fillable =['id','name','email','phone'];
}
