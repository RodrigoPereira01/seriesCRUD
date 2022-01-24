@extends('layouts.layout')

@section('titulo-jumbotron')
    Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')
<div class="container-fluid container-fluid-conteudo">
    <div class="container container-conteudo">
        <ul class="list-group">
            @foreach ($temporadas as $temporada)
                <li class="list-group-item">
                    Temporada {{$temporada->numero}}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection