@extends('adminlte::page')

@section('title', 'Cardápio')

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
                     mussarela e orégano.
                  </small>
                </p>
                <div class="small-box-footer row">
                  <button type="button" class="offset-3 col-9 btn btn-success btn-sm" data-toggle="modal" data-target="#addModal{{$p->pro_id}}" data-whatever="{{$p->pro_id}}">Adicionar <i class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="addModal{{$p->pro_id}}" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Pizza: {{$p->pro_nome}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('carrinho.add')}}" method="POST">
                <div class="modal-body">
                
                  @csrf
                  <div class="form-group">
                    <input hidden type="text" class="form-control" id="pro_id" name="pro_id" value="{{$p->pro_id}}">
                    <small>
                      Desmarque os ingredientes que não deseja nesta pizza. Todas as pizzas têm mussarela e orégano. 
                    </small>
                  </div>
                  @foreach ($p->ingredientes as $i)
                    <div class="form-group">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input checked type="checkbox" class="custom-control-input" id="{{$p->pro_id}}_{{$i->ing_id}}" name="{{$p->pro_id}}_{{$i->ing_id}}">
                          <label class="custom-control-label" for="{{$p->pro_id}}_{{$i->ing_id}}">
                            {{$i->ing_nome}}
                          </label>
                      </div>
                    </div>
                  @endforeach
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success btn-sm">Adicionar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endforeach
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg shadow-lg" style="opacity: .8;">
          <span class="info-box-icon">
            <img src="dist/img/background4.jpg" alt="PIZZA">
          </span>

          <div class="info-box-content">
            <span class="info-box-text">2 Sabores</span>

            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <p>
              <small>
                O valor depende dos sabores da Pizza
              </small>
            </p>
              <div class="small-box-footer row">
                <button type="button" class="offset-3 col-9 btn btn-success btn-sm" data-toggle="modal" data-target="#addModalMetade" data-whatever="metade">Montar Pizza <i class="fas fa-pizza-slice"></i></button>
              </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addModalMetade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">Escolha os sabores</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('carrinho.add2sabores')}}" method="POST">
              <div class="modal-body">
                @csrf
                <div class="form-group">
                  <label>Primeiro Sabor</label>
                  <select required id="selectSabor1" name="selectSabor1" class="form-control">
                    <option selected value="">-- Selecione --</option>
                    @foreach ($pizzas as $p)
                      <option value="sabor1_{{$p->pro_id}}">{{$p->pro_nome}}</option>
                    @endforeach
                  </select>
                  <div id="pai1">
                    @foreach ($pizzas as $p)
                      <div id="sabor1_{{$p->pro_id}}" style="display: none">
                        {{$p->pro_nome}}
                        <div class="form-group">
                          <small>
                            Desmarque os ingredientes que não deseja nesta pizza. Todas as pizzas têm mussarela e orégano. 
                          </small>
                        </div>
                        @foreach ($p->ingredientes as $i)
                          <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input checked type="checkbox" class="custom-control-input" id="sabor1_{{$p->pro_id}}_{{$i->ing_id}}" name="sabor1_{{$p->pro_id}}_{{$i->ing_id}}">
                                <label class="custom-control-label" for="sabor1_{{$p->pro_id}}_{{$i->ing_id}}">
                                  {{$i->ing_nome}}
                                </label>
                            </div>
                          </div>
                        @endforeach
                        
                      </div>
                    @endforeach
                  </div>
                  
                  
                </div>
                <hr>
                <div class="form-group">
                  <label>Segundo Sabor</label>
                  <select required id="selectSabor2" name="selectSabor2" class="form-control">
                    <option selected value="">-- Selecione --</option>
                    @foreach ($pizzas as $p)
                      <option value="sabor2_{{$p->pro_id}}">{{$p->pro_nome}}</option>
                    @endforeach
                  </select>
                  <div id="pai2">
                    @foreach ($pizzas as $p)
                      <div id="sabor2_{{$p->pro_id}}" style="display: none">
                        {{$p->pro_nome}}
                        <div class="form-group">
                          <small>
                            Desmarque os ingredientes que não deseja nesta pizza. Todas as pizzas têm mussarela e orégano. 
                          </small>
                        </div>
                        @foreach ($p->ingredientes as $i)
                          <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input checked type="checkbox" class="custom-control-input" id="sabor2_{{$p->pro_id}}_{{$i->ing_id}}" name="sabor2_{{$p->pro_id}}_{{$i->ing_id}}">
                                <label class="custom-control-label" for="sabor2_{{$p->pro_id}}_{{$i->ing_id}}">
                                  {{$i->ing_nome}}
                                </label>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    @endforeach
                  </div>
                </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btn-sm">Adicionar</button>
              </div>
            </form>
          </div>
        </div>
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
  <script>

    $(document).ready(function(){
      $('#selectSabor1').on('change', function(){
        var selectValor = '#'+$(this).val();
        $('#pai1').children('div').hide();
        $('#pai1').children(selectValor).show();
      });
    });

    $(document).ready(function(){
      $('#selectSabor2').on('change', function(){
        var selectValor2 = '#'+$(this).val();
        $('#pai2').children('div').hide();
        $('#pai2').children(selectValor2).show();
      });
    });

  </script>
@stop