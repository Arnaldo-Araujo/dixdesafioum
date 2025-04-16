@php use Illuminate\Support\Str; @endphp
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper d-none">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="search-bar input-group">
                    <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                        <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                    </button>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <i class="tim-icons icon-paper"></i>
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">Notícias</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        @forelse ($ultimasNoticias as $noticia)
                        <li class="nav-link">
                            <a href="{{ route('noticias.show', $noticia->id) }}">
                                {{ $noticia->titulo }}
                            </a>
                        </li>
                        @empty
                            <li class="nav-link">
                                <span class="nav-item dropdown-item text-muted">Nenhuma notícia recente</span>
                            </li>
                        @endforelse
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ asset(auth()->user()->foto ?? 'white/img/anime3.png') }}" alt="Foto de Perfil" class="rounded-circle" width="40">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Perfil') }}</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Pesquisar Notícias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('noticias.index') }}" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Digite o título">
                    </div>
                    <div class="form-group">
                        <label for="conteudo">Conteúdo contém</label>
                        <input type="text" name="conteudo" id="conteudo" class="form-control" placeholder="Palavra-chave no conteúdo">
                    </div>
                    <div class="form-group">
                        <label for="data">Data (opcional)</label>
                        <input type="date" name="data" id="data" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">🔍 Pesquisar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>

