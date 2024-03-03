<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Login\Cadastro;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $cadastro;

    public function __construct(
        Cadastro $cadastro,

    ) {
        $this->cadastro = $cadastro;
        $this->middleware('auth');
    }
    public function index()
    {
        $return = [];
        return view('cadastro.index', $return);
    }
}