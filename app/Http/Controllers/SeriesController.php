<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\SeriesFormRequest;
    use Illuminate\Http\Request;
    use App\Models\{Serie, Temporada, Episodios};
    use App\Services\CriadorDeSerie;
    use App\Services\RemovedorDeSerie;

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
        
        public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
        {

            // dd($request->qtd_temporadas);
            $serie = $criadorDeSerie
            ->CriarSerie(
                $request->nome, 
                $request->qtd_temporadas, 
                $request->ep_por_temporada
            );

            
                
                $request->session()
                ->flash(
                    'mensagem',
                    "Série {$serie->nome} cadastrada com sucesso!"
                );
                    
                return redirect('series');
           
        }

        
        public function destroy(
            Request $request,
            RemovedorDeSerie $removedorDeSerie) {
            try {
                $serie = Serie::where('id', $request->id)->first();
                if (empty($serie)) {

                    return redirect()->route('series')->with('status', 'Série não encontrada!');
                }
            
                $serie = $removedorDeSerie->removerSerie($request->id);

                $request->session()->flash(
                    'mensagem',
                    "Série {$request->nome} removida com sucesso!"
                );
            } catch (\Throwable $th) {
                throw $th;
            }
                
            return redirect('series');
        }
    }

?>