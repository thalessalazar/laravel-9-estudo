<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function index($cep)
    {
        $responseApi = Http::get("https://ws.apicep.com/cep.json?code=06233-030");

        return response()->json($responseApi->json(), 200);
    }
}
