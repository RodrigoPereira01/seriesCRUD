<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class TemporadasController extends Controller
{
    public function index ($serieId) 
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;
        
        return view('series.temporadas.index', compact('serie', 'temporadas'));
    }
}
