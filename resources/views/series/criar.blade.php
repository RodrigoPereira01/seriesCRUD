@extends('layouts.layout')

@section('titulo-jumbotron')
    Adicionar Série
@endsection

@section('conteudo')



    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item bg-transparent border-0">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome-serie" class="form-label">Nome da Série</label>
                <input type="text" name="nome" class="form-control" id="nome-serie" aria-describedby="Nome da serie" placeholder="Digite a série">
            </div>
            <button type="submit" class="btn btn-dark">Adicionar</button>
        </form>
    </div>
@endsection