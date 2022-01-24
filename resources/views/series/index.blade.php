@extends('layouts.layout');

@section('titulo-jumbotron')
    Séries
@endsection
   
@section('conteudo')
<div class="container-fluid container-fluid-conteudo">
    
<div class="container container-conteudo">

    @if (!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>  
    @endif

    <a href="{{route('novaserie')}}" class="btn btn-dark botao-add btn-grad mt-5 mb-5">Adicionar Série</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome da Série</th>
                <th scope="col">Temporadas</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($series as $serie)
            <tr class="">
                <td class="">{{$serie->nome}}</td>
                <td>
                    <a target="_blank" title="Temporadas" href="{{route('temporadas', $serie->id)}}" class="btn botao-lista btn-temporada">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </td>
                <td>
                    <button class="btn botao-lista btn-edit" title="Editar">
                        <i class="far fa-edit"></i>
                    </button>
                </td>
                <td>
                    <form method="POST" action="{{route('remove', $serie->id)}}" class="m-0"
                        onsubmit=" return confirm('Tem certeza que deseja remover a série {{$serie->nome}}?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn botao-lista btn-delete" title="Excluir">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
