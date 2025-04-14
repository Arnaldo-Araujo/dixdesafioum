@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-display-4 text-black">{{ __('Bem vindo!') }}</h1>
                        <p class="text-lead text-black">
                            {{ __('Aqui você pode gerenciar suas notícias com praticidade e segurança. Lembre-se: você só verá o que é seu. Explore, edite e publique com liberdade!') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
