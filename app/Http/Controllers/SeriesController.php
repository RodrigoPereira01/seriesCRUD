<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\SeriesFormRequest;
    use Illuminate\Http\Request;
    use App\Models\Serie;

    class SeriesController extends Controller
    {
        public function index(Request $request) {
            $series = Serie::query()
            ->orderBy('nome')
            ->get();
            $mensagem = $request->session()->get('mensagem');

            return view('series.index', compact('series',  'mensagem'));
        }

        public function new()
        {
            return view('series.criar');
        }
        
        public function store(SeriesFormRequest $request)
        {
            $nome = $request->nome;

            $serie = serie::create(['nome' => $request->nome]);
            $qtdTemporadas = $request->qtd_temporadas;
            for($i = 1; $i <= $qtdTemporadas; $i++){
                $temporada = $serie->temporadas()->create(['numero' => $i]);

                for ($j = 1; $j <= $request->ep_por_temporada; $j++) {
                    $episodio = $temporada->episodios()->create(['numero' => $j]);
                }
            }



            $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->nome} cadastrada com sucesso!"
            );
                
            return redirect('series');
        }

        
        public function destroy(Request $request) 
        {
            Serie::destroy($request->id);
            $request->session()
            ->flash(
                'mensagem',
                "Série {$request->nome} removida com sucesso!"
            );
                
            return redirect('series');
        }
    }
?>