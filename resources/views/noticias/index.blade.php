@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-contente-betwen aling-items-centrer mb-3">
        <h4>Minhas Notícias</h4>
    </div>
    <div class="d-flex justify-contente-betwen mb-3">
        <a href="{{ route('noticias.create') }}" class="btn btn-primary">Criar Nova</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($noticias->count())
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Abrir Notícias</th>
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
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-warning btn-sm">Abrir Notícia</a>
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
