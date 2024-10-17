<?php

namespace App\Http\Controllers;

use App\Models\Estoque\EstoqueSangues;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AgendamentoController extends Controller
{
    
    public function index(){
        
        $return = [];
        return view('agendamentos.index', $return);

    }


}
