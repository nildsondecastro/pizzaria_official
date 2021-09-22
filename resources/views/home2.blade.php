@extends('adminlte::page')

@section('title', 'Courotech')

@section('content_header')
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
    Trabalhando para otimizar o desenvolvimento de seus projetos

    <hr>

    <div id="vmap" style="width: 600px; height: 400px;"></div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jqvmap/jqvmap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jqvmap/jqvmap.min.css') }}">
@stop

@section('js')

    {{ Log::info("Homepage Acessada"); }}
    <script src="{{ asset('vendor/jqvmap/jquery.vmap.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/maps/jquery.vmap.brazil.js') }}" charset="utf-8"></script>
    
    <script>
        jQuery(document).ready(function () {
          jQuery('#vmap').vectorMap({
            map: 'brazil_br',
            onRegionClick: function (element, code, region) {
              var message = 'You clicked "'
                + region
                + '" which has the code: '
                + code.toUpperCase();
  
              alert(message);
            }
          });
        });
      </script>
@stop