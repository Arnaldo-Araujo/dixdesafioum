@extends('layouts.app', ['page' => 'noticias', 'pageSlug' => 'noticias'])

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title" style="font-weight: bold">{{ $noticia->titulo }}</h2>
    </div>
    <div class="card-body">
        <p>{{ $noticia->conteudo }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('noticias.index') }}" class="btn btn-sm btn-primary">← Voltar</a>
    </div>
</div>
@endsection
