@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Minhas Notícias</h4>
        <a href="{{ route('noticias.create') }}" class="btn btn-primary">Criar Nova</a>
    </div>

    {{-- Filtro de pesquisa --}}
    @if($noticias->total() > 0)
    {{-- Filtro de pesquisa --}}
    <form method="GET" action="{{ route('noticias.index') }}" class="mb-3">
        <div class="form-row align-items-end">
            <div class="col-md-4">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ request('titulo') }}">
            </div>
            <div class="col-md-4">
                <label for="conteudo">Conteúdo</label>
                <input type="text" name="conteudo" class="form-control" value="{{ request('conteudo') }}">
            </div>
            <div class="col-md-3">
                <label for="data">Data</label>
                <input type="date" name="data" class="form-control" value="{{ request('data') }}">
            </div>
            <div class="col-md-1 text-right">
                <button type="submit" class="btn btn-info btn-block">🔍</button>
            </div>
        </div>
    </form>
    @endif


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($noticias->count())
        @if(request()->has('titulo') || request()->has('conteudo') || request()->has('data'))
            <div class="alert alert-info d-flex justify-content-between align-items-center">
                <span>🔍 Exibindo resultados filtrados</span>
                <a href="{{ route('noticias.index') }}" class="btn btn-sm btn-outline-light">Limpar Filtros</a>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Abrir</th>
                        <th>Título</th>
                        <th>Conteúdo</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticias as $noticia)
                        <tr>
                            <td>
                                <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-warning btn-sm">Abrir</a>
                            </td>
                            <td style="width:10%">{{ $noticia->titulo }}</td>
                            <td style="width:50%">{{ Str::limit($noticia->conteudo, 50) }}</td>
                            <td style="width:10%">{{ $noticia->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="abrirModalExcluir({{ $noticia->id }})">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginação com filtros --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $noticias->appends(request()->query())->links() }}
        </div>

    @else
        <p>Você ainda não publicou nenhuma notícia.</p>
    @endif
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="formExcluir" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title" id="modalExcluirLabel">Confirmar Exclusão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Tem certeza que deseja excluir esta notícia? Esta ação não pode ser desfeita.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
          </div>
        </form>
      </div>
    </div>
</div>

<script>
    function abrirModalExcluir(id) {
        const form = document.getElementById('formExcluir');
        form.action = `/noticias/${id}`;
        $('#modalExcluir').modal('show');
    }
</script>
@endsection
