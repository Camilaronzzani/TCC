<?php

namespace App\Http\Controllers;

use GoogleMaps\Facade\GoogleMapsFacade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InstituicaoController extends Controller
{
    public function index()
    {
        return view('instituicao');
    }

}
