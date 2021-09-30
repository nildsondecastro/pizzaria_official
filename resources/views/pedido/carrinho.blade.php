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
    <div class="row justify-content-center">
      @foreach (Auth::user()->carrinho->itens as $item)
        <div class="col-md-3 col-11 callout callout-info">
          <div class="row">
            <p class="col-10">
              <small>
                <i class="icon fas fa-pizza-slice"></i> Pizza {{$item->itp_nome}}
              </small>
            </p>
            <div class="offset-1 col-1">
              <a href="#" ><i class="icon fa fa-trash-alt" style="color: red"></i></a>
            </div>
          </div>
            <small>
              <strong>R$ {{$item->itp_valor}}</strong>
            </small>
        </div>
      @endforeach
      <div class="col-md-3 col-11 callout callout-info">
        <small>
          Endereço
        </small>
      </div>
      <div class="col-md-3 col-11 callout callout-info">
        <small>
          <div class="row justify-content-between">
            Sub-total: <strong class="col-4">R$ {{Auth::user()->carrinho->car_valor}}</strong>
          </div>
          <div class="row justify-content-between">
            Taxa de entrega: <span class="offset-5 col-1">+</span><strong class="col-4">R$ {{Auth::user()->carrinho->car_taxa}}</strong>
          </div>
          <hr>
          <div class="row justify-content-between">
            Total: <strong class="col-4">R$ {{Auth::user()->carrinho->car_total}}</strong>
          </div>
        </small>
      </div>
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