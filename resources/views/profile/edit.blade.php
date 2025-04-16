@extends('layouts.app')

@section('content')
<style>
    .perfil-wrapper {
        position: relative;
        width: 120px;
        height: 120px;
        margin: 0 auto 10px;
    }

    .perfil-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #ddd;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    .perfil-overlay {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: rgba(0,0,0,0.6);
        color: white;
        font-size: 12px;
        text-align: center;
        padding: 6px 0;
        border-radius: 0 0 50% 50%;
        cursor: pointer;
    }

    .perfil-wrapper input[type="file"] {
        display: none;
    }

    .color-select span {
        display: inline-block;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        margin: 0 5px;
        border: 3px solid transparent;
        transition: border .2s;
    }

    .color-select .selected {
        border: 3px solid #444;
    }

    .color-primary { background-color: #007bff; }
    .color-blue { background-color: #17a2b8; }
    .color-green { background-color: #28a745; }
</style>

<div class="content">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Editar Perfil</h5>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Form da foto -->
<form action="{{ route('profile.updateFoto') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- preview + input -->
    <div class="form-group text-center">
        <label>Foto de Perfil</label>
        <div class="perfil-wrapper" onclick="document.getElementById('inputFoto').click();">
            <img id="previewFoto" src="{{ asset(auth()->user()->foto ?? 'white/img/anime3.png') }}" alt="Foto de Perfil">
            <div class="perfil-overlay">
                <i class="fa fa-camera"></i> Selecionar
            </div>
            <input type="file" name="foto" id="inputFoto" accept="image/*" onchange="previewImagem(this);">
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Salvar Foto
            </button>
        </div>
    </div>
</form>
@if(auth()->user()->foto)
    <form action="{{ route('profile.removerFoto') }}" method="POST" onsubmit="return confirm('Deseja realmente remover sua foto de perfil e voltar para a padrão?');" class="text-center mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning btn-sm">
            <i class="fa fa-undo"></i> Resetar Foto
        </button>
    </form>
@endif


                    <hr>

                    <!-- 🧾 Formulário separado dos dados -->
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Escolha de Cor -->
                        <div class="form-group">
                            <label>Cor do Tema (Sidebar)</label>
                            <div class="color-select">
                                <label>
                                    <input type="radio" name="theme_color" value="primary" class="d-none" {{ auth()->user()->theme_color == 'primary' ? 'checked' : '' }}>
                                    <span class="color-primary {{ auth()->user()->theme_color == 'primary' ? 'selected' : '' }}"></span>
                                </label>
                                <label>
                                    <input type="radio" name="theme_color" value="blue" class="d-none" {{ auth()->user()->theme_color == 'blue' ? 'checked' : '' }}>
                                    <span class="color-blue {{ auth()->user()->theme_color == 'blue' ? 'selected' : '' }}"></span>
                                </label>
                                <label>
                                    <input type="radio" name="theme_color" value="green" class="d-none" {{ auth()->user()->theme_color == 'green' ? 'checked' : '' }}>
                                    <span class="color-green {{ auth()->user()->theme_color == 'green' ? 'selected' : '' }}"></span>
                                </label>
                                <label>
                                    <input type="radio" name="theme_color" value="pink-purple" class="d-none" {{ auth()->user()->theme_color == 'pink-purple' ? 'checked' : '' }}>
                                    <span style="background: linear-gradient(to bottom, #ec4899, #8b5cf6);" class="{{ auth()->user()->theme_color == 'pink-purple' ? 'selected' : '' }}"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Nome e Email -->
                        <div class="row mt-4">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Trocar Senha -->
                        <hr>
                        <h6 class="text-muted mb-3">Trocar Senha</h6>
                        <div class="form-group">
                            <label for="current_password">Senha Atual</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Digite sua senha atual">
                        </div>
                        <div class="form-group">
                            <label for="new_password">Nova Senha</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Nova senha (mín. 6 caracteres)">
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirmar Nova Senha</label>
                            <input type="password" name="new_password_confirmation" class="form-control" placeholder="Repita a nova senha">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <div class="text-center">
                        <small class="text-muted">Última atualização: {{ auth()->user()->updated_at->format('d/m/Y H:i') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImagem(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewFoto').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.querySelectorAll('.color-select input').forEach((input) => {
        input.addEventListener('change', function () {
            document.querySelectorAll('.color-select span').forEach(span => span.classList.remove('selected'));
            this.nextElementSibling.classList.add('selected');
        });
    });
</script>
@endsection
