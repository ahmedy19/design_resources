<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // To Protect entered data
    protected $fillable = ['name','subject','email','message'];
    
}
