<?php

namespace App\Http\Controllers;

use App\Models\Estoque\EstoqueSangues;
use App\Models\TipoSanguineo;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
                    'questao' => 'É seguro doar sangue?',
                    'resposta' => 'Sim, a doação de sangue é segura. Todo o processo é realizado com material descartável e estéril.',
                ],
                [
                    'questao' => 'É necessário estar em jejum para doar?',
                    'resposta' => 'Não, pelo contrário, é importante estar bem alimentado antes da doação. Evite alimentos gordurosos nas 4 horas que antecedem a doação.',
                ],
                [
                    'questao' => 'Quais os cuidados após a doação?',
                    'resposta' => 'Após a doação, é recomendado repousar por 10 a 15 minutos, beber bastante líquido e evitar esforços físicos por 12 horas.',
                ],
                [
                    'questao' => 'Qual é a quantidade de sangue coletada?',
                    'resposta' => 'Em cada doação, são coletados aproximadamente 450 ml de sangue.',
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
