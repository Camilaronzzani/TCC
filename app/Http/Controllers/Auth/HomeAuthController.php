<?php

namespace App\Http\Controllers\Auth;

use App\Models\TipoSanguineo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeAuthController extends Controller
{
    public function index()
    {
        $return = [
            'tipos' => TipoSanguineo::pluck('tipos', 'id'),
        ];

        return view('auth.home_auth', $return);
    }
}
