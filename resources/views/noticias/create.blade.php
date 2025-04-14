@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Criar Nova Notícia</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('noticias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" class="form-control" rows="5" required>{{ old('conteudo') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('noticias.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
