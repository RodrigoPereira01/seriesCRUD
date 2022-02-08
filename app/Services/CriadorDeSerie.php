<?php

namespace App\Services;

use App\Models\Serie;
use app\Models\Temporada;
use app\Models\Episodios;
use phpDocumentor\Reflection\Types\Integer;

class CriadorDeSerie  
{
    public function CriarSerie (string $nomeSerie, int $qtdTemporadas, int $epPorTemporada) : Serie 
    {
        $serie = serie::create(['nome' => $nomeSerie]);
        $qtdTemporadas = $qtdTemporadas;
        $epPorTemporada = $epPorTemporada;
        
        for($i = 1; $i <= $qtdTemporadas; $i++){
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $epPorTemporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
    
        return $serie;

    }
}

?>