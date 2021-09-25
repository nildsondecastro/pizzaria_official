@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', 'Novo Cliente')

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="Nome" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="Email" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            <div class="col-12">
                <small>
                    Usado para o login.
                </small>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="Senha" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            <div class="col-12">
                <small>
                    A senha deve ter no mínimo 6 caracteres.
                </small>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="Confirme a senha" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="card card-secondary collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Informações Adicionais</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <small style="color: red">
                                Estas Informações podem ser adicionadas depois ou no momento do pedido.
                            </small>
                        </div>
                        <div class="input-group col-12">
                            <input type="text" id="telefone" name="telefone" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                                   value="{{ old('telefone') }}" placeholder="988660000" maxlength="20">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                            @if($errors->has('telefone'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </div>
                            @endif
                            <p class="col-12">

                            </p>
                        </div>

                        <div class="input-group col-12">
                            <textarea name="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                                placeholder="Endereço Rua 1, Casa A, Bairro B, São Luis, CEP 65000-000"
                                rows="6">{{ old('endereco') }}</textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <small>
                                    Informe o endereço com o máximo de informações possíveis.
                                </small>
                            </div>
                            @if($errors->has('endereco'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('endereco') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            Concluir Cadastro
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            Já tenho uma conta
        </a>
    </p>
@stop

@section('js')
    {{ Log::info("Tela de registro de novo usuário acessada."); }}

    <script> 
        const telefone = document.getElementById('telefone') // Seletor do campo de telefone

        telefone.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
        telefone.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

        const mascaraTelefone = (valor) => {
            valor = valor.replace(/\D/g, "")
            valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
            telefone.value = valor // Insere o(s) valor(es) no campo
        }
    </script>
@stop
