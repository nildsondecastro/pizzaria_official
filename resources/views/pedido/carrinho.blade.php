@extends('adminlte::page')

@section('title', 'Carrinho')

@section('content_header')
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
@stop

@section('content')
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 borda-texto" style="color: white; text-shadow: 2px 2px black;">Carrinho</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content" >
    <div class="row">
      
    </div>
  </section>

  
@stop

@section('css')
  <style>
    .content-wrapper {
      background-image: url('dist/img/background1.jpg');
      background-position: center;
      background-size: cover;
    }
  </style>
@stop

@section('js')
@stop