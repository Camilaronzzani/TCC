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
        // $apiUrl = config('services.api.url');
        // $apiKey = config('services.api.key'); 

        // try {
        //     $response = GoogleMapsFacade::load('placeadd')
        //     ->setParam([
        //        'location' => [
        //             'lat'  => -33.8669710,
        //             'lng'  => 151.1958750
        //           ],
        //        'accuracy'           => 0,
        //        "name"               =>  "Google Shoes!",
        //        "address"            => "48 Pirrama Road, Pyrmont, NSW 2009, Australia",
        //        "types"              => ["shoe_store"],
        //        "website"            => "http://www.google.com.au/",
        //        "language"           => "en-AU",
        //        "phone_number"       =>  "(02) 9374 4000"
        //               ])
        //       ->get();
        //       dd($response);
        //     // Verifica se a resposta foi bem-sucedida
        //     if ($response->successful()) {
        //         $return = [
        //             'response' => $response,
        //             'instituicoes' => $response->json(),
        //         ];

        //         // Retorna a view com os dados das instituições
        //         return view('instituicao', $return);
        //     } else {
        //         // Loga qualquer resposta não bem-sucedida para depuração
        //         Log::error('API response error: ' . $response->status());
        //         abort(500, 'Erro ao carregar dados das instituições.');
        //     }
        // } catch (\Exception $e) {
        //     Log::error('Erro ao se conectar com a API: ' . $e->getMessage());
        //     abort(500, 'Erro ao se conectar com a API.');
        // }
    }
}
