@extends('layouts.app')

@section('content')
<div class="container card mt-4">
    <div class="card-header">
        <h2 class="text-center">Deseja reportar um Bug?</h2>
        <p class="text-center">Você descobriu um bug em algum de nossos jogos? Informe aqui e nossa equipe cuidará do problema o mais rápido possível.</p>
    </div>
    <div class="card-body">
        <form action="{{ route('bugs.salvar') }}" method='POST' enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="titulo">Título do Bug: </label>
                <input type="text" class="form-control"  id="titulo" name="titulo" value="{{ old('titulo')}}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Bug: </label>
                <textarea name="descricao" id="descricao" cols="30" rows="4" class="form-control" value="{{ old('descricao')}}"></textarea>
            </div>
            <div class="form-group">
                <label for="tipo_bug_id">Tipo de Bug:</label>
                <select class="form-control" id="tipo_bug_id" name="tipo_bug_id">
                    <option>Selecione um tipo de bug</option>
                    @foreach($tipo_bugs as $tipo_bug)
                        <option value="{{ $tipo_bug->id }}">{{ $tipo_bug->descricao }}</option>
                    @endforeach
                </select>
            </div>
            <div class="custom-file mb-3">
                <label for="imagem">Printscreens do bug: </label>
                <input type="file" class="form-control custom-file-label" id="imagem" name="imagens[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>

        </form>
    </div>
</div>
@endsection
