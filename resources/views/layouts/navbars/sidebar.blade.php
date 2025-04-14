@php $pageSlug = $pageSlug ?? '' @endphp
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">{{ _('DIX Digital Dashboard') }}</a>
        </div>
        <ul class="nav">
            <!-- Perfil do usuário -->
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Meu Perfil de Usuario') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li class="{{ Request::routeIs('profile.edit') ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Meu Perfil</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Gerenciamento de notícias -->
            <li class="{{ Request::routeIs('noticias.*') ? 'active' : '' }}">
                <a href="{{ route('noticias.index') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>Minhas Notícias</p>
                </a>
            </li>
        </ul>
    </div>
</div>
