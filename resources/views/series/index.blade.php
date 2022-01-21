@extends('layouts.layout');

@section('titulo-jumbotron')
    Séries
@endsection
   
@section('conteudo')

       

 

<div class="container">

    @if (!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>  
    @endif

    <a href="{{route('novaserie')}}" class="btn btn-dark mt-5 mb-5">Adicionar Série</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome da Série</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($series as $serie)
            <tr>
                <td class="">{{$serie->nome}}</td>
                <td><button class="btn btn-info">Editar</button></td>
                <td>
                    <form method="POST" action="{{route('remove', $serie->id)}}"
                        onsubmit=" return confirm('Tem certeza que deseja remover a série {{$serie->nome}}?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-delete">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
