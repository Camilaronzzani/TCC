<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Login\Login;

class TermosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $login;

    public function __construct(
        Login $login,

    ) {
        $this->login = $login;
        $this->middleware('auth');
    }
    public function index()
    {
        $return = [];
        return view('login.index', $return);
    }
}