<?php

namespace App\Http\Controllers;

use App\Models\Estoque\EstoqueSangues;
use App\Models\TipoSanguineo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $estoques = EstoqueSangues::with('entradas', 'saidas')->get();

        $return = [
            'estoques' => $estoques,

            'tipos' => TipoSanguineo::pluck('tipos', 'id'),

            'perguntas' => [
                [
                    'question' => 'É seguro doar sangue?',
                    'answer' => 'Sim, a doação de sangue é segura. Todo o processo é realizado com material descartável e estéril.',
                ],
                [
                    'question' => 'É necessário estar em jejum para doar?',
                    'answer' => 'Não, pelo contrário, é importante estar bem alimentado antes da doação. Evite alimentos gordurosos nas 4 horas que antecedem a doação.',
                ],
                [
                    'question' => 'Quais os cuidados após a doação?',
                    'answer' => 'Após a doação, é recomendado repousar por 10 a 15 minutos, beber bastante líquido e evitar esforços físicos por 12 horas.',
                ],
                [
                    'question' => 'Qual é a quantidade de sangue coletada?',
                    'answer' => 'Em cada doação, são coletados aproximadamente 450 ml de sangue.',
                ],
            ],
        ];

        if (Auth::check()) {
            return redirect()->route('home_auth');
        }
        return view('home', $return);
    }


    public function pode_doar()
    {
        return view('pode_doar');
    }

    public function instituicoes()
    {
        return view('instituicoes');
    }

    public function comoFunciona()
    {
        return view('como_funciona');
    }
}
