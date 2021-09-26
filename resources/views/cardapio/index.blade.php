@extends('adminlte::page')

@section('title', 'Cardápio')

@section('content_header')
  @if (\Session::has('mensagem'))
    <div class="alert alert-success alert-dismissible col-11">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>{!! \Session::get('mensagem') !!}</h5>
    </div>
  @endif
  @if (\Session::has('mensagem_erro'))
    <div class="alert alert-danger alert-dismissible col-11">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i>{!! \Session::get('mensagem_erro') !!}</h5>
    </div>
  @endif
@stop

@section('content')
  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 borda-texto" style="color: white; text-shadow: 2px 2px black;">Cardápio</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Falta Verificar o Status  -->
  <section class="content" >
    <div class="row">
      @foreach ($pizzas as $p)
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg shadow-lg" style="opacity: .8;">
            <span class="info-box-icon">
              <img src="dist/img/background4.jpg" alt="PIZZA">
            </span>

            <div class="info-box-content">
              <span class="info-box-text">{{$p->pro_nome}}</span>
              <span class="info-box-number">R$ {{$p->pro_valor}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                <p>
                  <small>
                    @foreach ($p->ingredientes as $i)
                      {{$i->ing_nome ?? ''}},
                    @endforeach
                  </small>
                </p>
                <div class="small-box-footer row">
                  <a href="#" class="offset-3 col-9 btn btn-success btn-sm">Adicionar <i class="fas fa-cart-arrow-down"></i></a>
                </div>
                
            </div>
          </div>
        </div>
      @endforeach
      
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