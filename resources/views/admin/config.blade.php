@extends('adminlte::page')

@section('title', 'Configurações')

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
          <h1 class="m-0 borda-texto" style="color: white; text-shadow: 2px 2px black;">Configurações</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content" >
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Opções de Configuração</h3>
            <ul class="nav nav-pills ml-auto p-2">
              <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tela Inicial</a></li>
              <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <p class="col-12">
                  Coloque as informações da forma que deseja que sejam exebidas. Sempre verifique a tela inicial após as alterações. Caso deseje que alguma informação não seja exibida basta deixar em branco.
                </p>
                <form action="{{route('config.homepage')}}" class="form-horizontal" method="POST">
                  @csrf
                  <div class="form-group row">
                    <label for="hom_aberto" class="col-sm-2 col-form-label">Aberto para Pedidos? No momento: {{$homepage->hom_aberto ?? 'Fechado'}}</label>
                    <div class="col-sm-10">
                      <select required name="hom_aberto" class="form-control">
                        <option selected value="">-- Selecione --</option>
                        <option value="Aberto.">Aberto</option>
                        <option value="">Fechado</option>
                      </select>
                      @if($errors->has('hom_aberto'))
                          <strong class="text-red">
                              <small>
                                  {{ $errors->first('hom_aberto') }}
                              </small>
                          </strong>
                      @endif

                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="hom_faixa_decorativa" class="col-sm-2 col-form-label">Faixa Decorativa</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" class="form-control"
                              name="hom_faixa_decorativa" value="{{$homepage->hom_faixa_decorativa}}">
                          @if($errors->has('hom_faixa_decorativa'))
                              <strong class="text-red">
                                  <small>
                                      {{ $errors->first('hom_faixa_decorativa') }}
                                  </small>
                              </strong>
                          @endif

                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="hom_nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="form-control"
                            name="hom_nome" value="{{$homepage->hom_nome}}">
                        @if($errors->has('hom_nome'))
                            <strong class="text-red">
                                <small>
                                    {{ $errors->first('hom_nome') }}
                                </small>
                            </strong>
                        @endif

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hom_telefone" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="form-control"
                            name="hom_telefone" value="{{$homepage->hom_telefone}}">
                        <p>
                          <small>
                            Coloque exatamente da forma que deseja que o telefone seja exibido.
                          </small>
                        </p>
                        @if($errors->has('hom_telefone'))
                            <strong class="text-red">
                                <small>
                                    {{ $errors->first('hom_telefone') }}
                                </small>
                            </strong>
                        @endif

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hom_local" class="col-sm-2 col-form-label">Local</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="form-control"
                            name="hom_local" value="{{$homepage->hom_local}}">
                        @if($errors->has('hom_local'))
                            <strong class="text-red">
                                <small>
                                    {{ $errors->first('hom_local') }}
                                </small>
                            </strong>
                        @endif

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hom_minimo" class="col-sm-2 col-form-label">Mínimo para entrega?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="form-control"
                            name="hom_minimo" value="{{$homepage->hom_minimo}}">
                        @if($errors->has('hom_minimo'))
                            <strong class="text-red">
                                <small>
                                    {{ $errors->first('hom_minimo') }}
                                </small>
                            </strong>
                        @endif

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hom_info1" class="col-sm-2 col-form-label">Informação Adicional</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="form-control"
                            name="hom_info1" value="{{$homepage->hom_info1}}">
                        @if($errors->has('hom_info1'))
                            <strong class="text-red">
                                <small>
                                    {{ $errors->first('hom_info1') }}
                                </small>
                            </strong>
                        @endif

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hom_info2" class="col-sm-2 col-form-label">Outra Informação Adicional</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="form-control"
                            name="hom_info2" value="{{$homepage->hom_info2}}">
                        @if($errors->has('hom_info2'))
                            <strong class="text-red">
                                <small>
                                    {{ $errors->first('hom_info2') }}
                                </small>
                            </strong>
                        @endif

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hom_tempo_atendimento" class="col-sm-2 col-form-label">Horário de Atendimento</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="form-control"
                            name="hom_tempo_atendimento" value="{{$homepage->hom_tempo_atendimento}}">
                        @if($errors->has('hom_tempo_atendimento'))
                            <strong class="text-red">
                                <small>
                                    {{ $errors->first('hom_tempo_atendimento') }}
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
              </div>
              <div class="tab-pane" id="tab_2">

              </div>
              <div class="tab-pane" id="tab_3">

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
  {{ Log::info("Tela de Configurações acessada por ".Auth::user()); }}
@stop