@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Deseja reportar um Bug?</h2>
    <p class="text-center">Você descobriu um bug em algum de nossos jogos? Informe aqui e nossa equipe cuidará do problema o mais rápido possível.</p>
    <form action="{{ route('bugs.salvar') }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12">
                <label for="titulo">Título do Bug: </label>
                <input type="text" class="form-control"  id="titulo" name="titulo" value="{{ old('titulo')}}" required>
            </div>
            <div class="form-group col-12">
                <label for="descricao">Descrição do Bug: </label>
                <textarea name="descricao" id="descricao" cols="30" rows="4" class="form-control" value="{{ old('descricao')}}" required></textarea>
            </div>
            <div class="form-group col-sm-6">
                <label for="tipo_bug_id">Tipo de Bug:</label>
                <select class="form-control" id="tipo_bug_id" name="tipo_bug_id" required>
                    <option></option>
                    @foreach($tipo_bugs as $tipo_bug)
                        <option value="{{ $tipo_bug->id }}">{{ $tipo_bug->descricao }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label for="imagem">Printscreens do bug: </label>
                <input type="file" class="form-control" id="imagem" name="imagens[]" multiple>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        @isset($success)
            @if($success)
                <div class="alert alert-success mt-3">
                    <strong>Sucesso!</strong> Bug foi cadastrado com sucesso.
                </div>
            @else
                <div class="alert alert-danger mt-3">
                    <strong>Erro!</strong> Ocorreu um erro ao cadastrar o bug.
                </div>
            @endif
        @endisset
    </form>
</div>
@endsection
