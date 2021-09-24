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
  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Painel de Controle</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="card card-primary col-lg-9 col-12">
            <div class="card-header">
              <h3 class="card-title">Número Total de Usuários Registrados: {{count($users)}}</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="line-chart" width="800" height="400"></canvas>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <div class="row">
              <div class="col-sm-4 col-lg-12">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>
    
                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-sm-4 col-lg-12">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>
    
                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-sm-4 col-lg-12">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>
    
                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            
          </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
@stop

@section('css')
  <link rel="stylesheet" href="vendor/chart.js/Chart.css">
@stop

@section('js')

    <script src="vendor/chart.js/Chart.js"></script>
    <script src="vendor/chart.js/Chart.bundle.js"></script>
    {{ Log::info("Dashboard Acessado"); }}
    <script>
      
      new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
          labels: ['30 dias atrás',29,28,27,26,25,24,23,22,'três semanas atrás',20,19,18,17,16,15,'duas semanas atrás',13,12,11,10,9,8,'uma semana atrás',6,5,4,3,'antes de ontem','ontem'],
          datasets: [{ 
              data: [@foreach ($clientes as $c){{$c}}, @endforeach],
              label: "Clientes Registrados",
              borderColor: "#3e95cd",
              fill: false
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'Crescimento nos Últimos 30 dias. (não contando o dia de hoje)'
          }
        }
      });

    </script>
@stop