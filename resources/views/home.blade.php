@extends('adminlte::page')

@section('title', 'Pizzaria')

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
    <div class="row">
      <div class="col-12" style="padding-left: 0px; padding-right: 0px;">
        <div class="position-relative p-3 bg-gray destaque" style="height: 120vh; min-height: 560px;">
          <!-- <img src="../../dist/img/photo1.png" alt="Photo 1" class="img-fluid"> -->
          @if (isset($homepage->hom_faixa_decorativa))
            <br><br><br>
            <div class="ribbon-wrapper ribbon-xl" >
              <div class="ribbon bg-warning text-lg" style="right: 30px;">
                <small><small><small>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <span>
                    {{$homepage->hom_faixa_decorativa ?? ''}}
                  </span>
                </small></small></small>
              </div>
            </div>
            <br>
          @endif
          
          @if (isset($homepage->hom_nome))
            {{$homepage->hom_nome ?? ''}} <br>
          @endif

          <div class="description-block">
            @if (isset($homepage->hom_aberto))
              <a class="btn btn-info btn-sm" href="#">
                <h5 class="description-header">Faça seu Pedido</h5>
                <span class="description-text">
                  <i class="icon fas fa-chart-pie"></i>
                  <i class="icon fas fa-pizza-slice"></i>
                  <i class="icon fas fa-pizza-slice"></i>
                  <i class="icon fas fa-pizza-slice"></i>
                  <i class="icon fas fa-chart-pie"></i>
                  <i class="icon fas fa-pizza-slice"></i>
                  <i class="icon fas fa-pizza-slice"></i>
                </span>
              </a>
            @else
              <h5 class="description-header">Não estamos abertos no momento.</h5>
            @endif
          </div>
          <br>

          @if (isset($homepage->hom_telefone))
            <div class="description-block">
              <h5 class="description-header"><i class="icon fas fa-phone"></i> {{$homepage->hom_telefone ?? ''}}</h5>
            </div>
          @endif
          @if (isset($homepage->hom_local))
            <div class="description-block">
              <h5 class="description-header"><i class="icon fas fa-street-view"></i> {{$homepage->hom_local ?? ''}}</h5>
            </div>
          @endif
          <br>
          @if (isset($homepage->hom_minimo))
            <div class="description-block">
              <span class="description-text"><i class="icon fas fa-money-bill-wave"></i> {{$homepage->hom_minimo ?? ''}}</span>
            </div>
          @endif
          @if (isset($homepage->hom_info1))
            <div class="description-block">
              <span class="description-text"><i class="icon fas fa-pizza-slice"></i> {{$homepage->hom_info1 ?? ''}}</span>
            </div>
          @endif
          @if (isset($homepage->hom_info2))
            <div class="description-block">
              <span class="description-text"><i class="icon fas fa-pizza-slice"></i> {{$homepage->hom_info2 ?? ''}}</span>
            </div>
          @endif
          @if (isset($homepage->hom_tempo_atendimento))
            <div class="description-block">
              <span class="description-text"><i class="icon fas fa-clock"></i> {{$homepage->hom_tempo_atendimento ?? ''}}</span>
            </div>
          @endif
        </div>
      </div>
    </div>
@stop

@section('css')
  <style>
    .destaque{
        background-image: url('dist/img/{{$homepage->hom_background}}.jpg');
        background-position: center;
        background-size: cover;
        height: 260px;   
    }
  </style>
@stop

@section('js')
    {{ Log::info("Homepage Acessada"); }}
@stop