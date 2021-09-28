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
              <div class="modal-body">
                <form action="#" method="POST">
                  @csrf
                  <div class="form-group">
                    <input hidden type="text" class="form-control" id="pro_id" value="{{$p->pro_id}}">
                    <small>
                      Desmarque os ingredientes que não deseja nesta pizza.  
                    </small>
                  </div>
                  @foreach ($p->ingredientes as $i)
                    <div class="form-group">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input checked type="checkbox" class="custom-control-input" id="{{$i->ing_id}}" name="{{$i->ing_id}}">
                          <label class="custom-control-label" for="{{$i->ing_id}}">
                            {{$i->ing_nome}}
                          </label>
                      </div>
                    </div>
                  @endforeach
                  <!-- 
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Observação Adicional:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                  -->
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btn-sm">Adicionar</button>
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
  //<script>
  //  $('#addModal').on('show.bs.modal', function (event) {
  //    var button = $(event.relatedTarget) // Button that triggered the modal
  //    var pro_id = button.data('whatever') // Extract info from data-* attributes
  //    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  //    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  //    var modal = $(this)
  //    modal.find('.modal-title').text('New message to ' + pro_id)
  //    modal.find('.modal-body input').val(pro_id)
  //  })
  //</script>
@stop