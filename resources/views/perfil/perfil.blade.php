@extends('adminlte::page')

@section('title', 'Seu Perfil')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Bem vindo(a) {{Auth::user()->name}}</h1>
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
        <div class="alert alert-success alert-dismissible col-6">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i>{!! \Session::get('mensagem') !!}</h5>
        </div>
    @endif
    @if (\Session::has('mensagem_erro'))
        <div class="alert alert-danger alert-dismissible col-6">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i>{!! \Session::get('mensagem_erro') !!}</h5>
        </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="#seguranca" data-toggle="tab">Segurança</a></li>
                                <li class="nav-item"><a class="nav-link active" href="#dados" data-toggle="tab">Dados</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" id="seguranca">
                                    <div class="card-body">
                                        <strong><i class="fas fa-book mr-1"></i> Perfil criado em: </strong>
                                            <p>
                                                {{date('d/m/Y h:i:s', strtotime(Auth::user()->created_at));}}
                                            </p>
                                        <hr>
                        
                                        <strong><i class="fas fa-book mr-1"></i> Ultima atualização dos dados: </strong>
                                            <p>
                                                {{date('d/m/Y h:i:s', strtotime(Auth::user()->updated_at));}}
                                            </p>
                                        <hr>

                                        <strong><i class="fas fa-book mr-1"></i> Status: </strong>
                                            <p>
                                                @if (Auth::user()->status)
                                                    Usuário Ativo
                                                @else
                                                    Usuário Restringido (não pode mais realizar login)
                                                @endif
                                            </p>
                                        <hr>
                                        <strong><i class="fas fa-book mr-1"></i> Permissões deste usuário: </strong>
                                            <p>
                                                @isset($p)
                                                    @if ($p->os)
                                                        Pode Gerenciar Ordens de Serviço <br>
                                                    @endif
                                                    @if ($p->estoque)
                                                        Pode Gerenciar Estoque <br>
                                                    @endif
                                                    @if ($p->show_users)
                                                        Visualizar Usuários <br>
                                                    @endif
                                                    @if ($p->add_users)
                                                        Adicionar Usuários <br>
                                                    @endif
                                                    @if ($p->edit_users)
                                                        Editar Usuários <br>
                                                    @endif
                                                    @if ($p->restrict_users)
                                                        Restringir Usuários <br>
                                                    @endif
                                                @endisset
                                            </p>
                                        <hr>
                                    </div>
                                </div>

                                <div class="tab-pane active" id="dados">
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
                                            <label for="email" class="col-sm-2 col-form-label">Nome de Usuário <br>
                                                <span class="small">usado no login</span></label>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{ Log::info("Tela de Perfil acesssada. ".Auth::user()); }}
@stop