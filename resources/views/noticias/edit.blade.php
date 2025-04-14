@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Editar Notícia</h4>

    <form method="POST" action="{{ route('noticias.update', $noticia->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $noticia->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" class="form-control" rows="6" required>{{ old('conteudo', $noticia->conteudo) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('noticias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
