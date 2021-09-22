@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content_header')
    <h1>Lista de Usuários</h1><br>
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
@stop

@section('content')

    
    <div class="card card-primary col-12">
        <div class="card-header">
            <h3 class="card-title">Lista de Usuários</h3>
        </div>
        
        @if (isset($users))
            <form action="#" method="POST">
                {{ csrf_field() }}
                <small>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Nome de Usuário</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($users as $item)
                                    <tr data-widget="expandable-table" aria-expanded="true">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        @if ($item->status)
                                            <td style="background-color: rgb(98, 230, 98);">
                                                <strong>Usuário Ativo</strong>
                                            </td>
                                        @else
                                            <td style="background-color: rgb(250, 204, 79);">
                                                <strong>Usuário Restringido</strong>
                                            </td>
                                        @endif
                                        <td>
                                            <a href="/user/edit/{{$item->id}}" class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </small>
                
            </form>
            
        @else
            Sem Usuários Cadastrados.
        @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{ Log::info("Lista de Usuários acessada ".Auth::user()); }}
@stop