@extends('layouts.layout')

@section('titulo-jumbotron')
    Adicionar Série
@endsection

@section('conteudo')
<div class="container-fluid container-fluid-conteudo bg-black">
    <div class=" container container-conteudo">
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
            <div class="row pt-5">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="mb-3">
                        <label for="nome-serie" class="form-label">Nome da Série</label>
                        <input type="text" name="nome" class="form-control" id="nome-serie" aria-describedby="Nome da serie" placeholder="Digite a série">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <div class="mb-3">
                        <label for="qtd_temporadas" class="form-label">Nº de Temporadas</label>
                        <input type="number" name="qtd_temporadas" class="form-control" id="qtd_temporadas" aria-describedby="Quantidade de temporadas" placeholder="Digite o nº de temporadas">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <div class="mb-3">
                        <label for="ep_por_temporada" class="form-label">Nº de Episódios</label>
                        <input type="number" name="ep_por_temporada" class="form-control" id="ep_por_temporada" aria-describedby="Episódios por temporada" placeholder="Digite o nº de episódios">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark botao-add mt-4 btn-grad   ">Adicionar</button>
        </form>
    </div>
</div>
@endsection