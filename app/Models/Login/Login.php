<?php

namespace App\Models\Login;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
  protected $connection = 'mysql';
  protected $guarded = [];
  public $timestamps = false;

}