@extends('adminlte::page')

@section('title', 'Seu Perfil')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perfil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Página Inicial</a></li>
                    <li class="breadcrumb-item active">Perfil de usuário</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    
    @if (\Session::has('mensagem'))
        <small>
            <div class="alert alert-success alert-dismissible col-11">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i>{!! \Session::get('mensagem') !!}
            </div>
        </small>
    @endif
    @if (\Session::has('mensagem_erro'))
        <small>
            <div class="alert alert-danger alert-dismissible col-11">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i>{!! \Session::get('mensagem_erro') !!}
            </div>
        </small>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="card-body">
                                        <form action="/perfil/dados" class="form-horizontal" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" class="form-control"
                                                        name="name" value="{{Auth::user()->name}}">
                                                    @if($errors->has('name'))
                                                        <strong class="text-red">
                                                            <small>
                                                                {{ $errors->first('name') }}
                                                            </small>
                                                        </strong>
                                                    @endif
    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Usuário (email) <br>
                                                    <span class="small">Usado no login</span></label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                        name="email" value="{{Auth::user()->email}}">
                                                    @if($errors->has('email'))
                                                        <strong class="text-red">
                                                            <small>
                                                                {{ $errors->first('email') }}
                                                            </small>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="text" class="col-sm-2 col-form-label">Telefone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="telefone" name="telefone" class="form-control" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                                                        value="{{Auth::user()->telefone}}">
                                                    @if($errors->has('telefone'))
                                                        <strong class="text-red">
                                                            <small>
                                                                {{ $errors->first('telefone') }}
                                                            </small>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="endereco" class="col-sm-2 col-form-label">Endereço</label>
                                                <div class="col-sm-10">
                                                    <textarea name="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                                                        placeholder="Endereço Rua 1, Casa A, Bairro B, São Luis, CEP 65000-000"
                                                        rows="6">{{Auth::user()->endereco}}</textarea>
                                                    <div class="col-12">
                                                        <small><small>
                                                            Informe o endereço com o máximo de informações possíveis.
                                                        </small></small>
                                                    </div>
                                                    @if($errors->has('endereco'))
                                                        <strong class="text-red">
                                                            <small>
                                                                {{ $errors->first('endereco') }}
                                                            </small>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <form action="/perfil/senha" class="form-horizontal" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">Senha Nova</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                        name="password">
                                                    @if($errors->has('password'))
                                                        <strong class="text-red">
                                                            <small>
                                                                {{ $errors->first('password') }}
                                                            </small>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirme a Senha</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                        name="password_confirmation">
                                                    @if($errors->has('password_confirmation'))
                                                        <strong class="text-red">
                                                            <small>
                                                                {{ $errors->first('password_confirmation') }}
                                                            </small>
                                                        </strong>
                                                    @endif
    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Salvar senha nova</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <small>
                                            <strong><i class="fas fa-book mr-1"></i> Perfil criado em: </strong>
                                            <p>
                                                {{date('d/m/Y H:i:s', strtotime(Auth::user()->created_at));}}
                                            </p>
                                            <strong><i class="fas fa-book mr-1"></i> Ultima atualização dos dados: </strong>
                                            <p>
                                                {{date('d/m/Y H:i:s', strtotime(Auth::user()->updated_at));}}
                                            </p>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@stop

@section('css')
@stop

@section('js')
    {{ Log::info("Tela de Perfil acesssada. ".Auth::user()); }}

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