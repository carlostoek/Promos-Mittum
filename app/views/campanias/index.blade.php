@extends ('layout.general')
@section ('content')
<script>
var data = JSON.parse('{{ $datos }}');
var uno = data.valor1;
var dos = data.valor2;

// Pasamos datos Json
/*var datosTabla = '{{ $campanias }}';
console.log(datosTabla);*/
 
//Lo parseamos para convertirlo en objeto
/*var datosTablaParseados = JSON.parse(datosTabla);
console.log(datosTablaParseados); */

//Y lo recorremos

</script>
  	<div class="page-heading">
    	<h3>Escritorio</h3>
	    <ul class="breadcrumb">
      <li>
          <a href="#">Escritorio</a>
      </li>
      <li class="active"> Mi Escritorio</li>
      </ul>
    </div>
    <!-- page heading end-->

    <!--body wrapper start-->
    <div class="wrapper">
     <div class="row">
        <div class="col-md-6">
            <!--statistics start-->
            <div class="row state-overview">
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <div class="panel purple">
                        <div class="symbol">
                            <i class="fa fa-gavel"></i>
                        </div>
                        <div class="state-value">
                            <div class="value">{{ $campanias->count(); }}</div>
                            <div class="title"> Campañas Enviadas</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <div class="panel red">
                        <div class="symbol">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="state-value">
                            <div class="value">{{ $participantes->count(); }}</div>
                            <div class="title"> Participantes</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row state-overview">
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <div class="panel blue">
                        <div class="symbol">
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="state-value">
                            <div class="value">{{ $sumaPosibles->limite }}</div>
                            <div class="title"> Posibles Ganadores</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <div class="panel green">
                        <div class="symbol">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="state-value">
                            <div class="value">{{ $participantesOk }}</div>
                            <div class="title"> Felices Ganadores</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--statistics end-->
        </div>
        <div class="col-md-6">
            <!--more statistics box start-->
            <div class="panel deep-purple-box">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <div id="graph-donut" class="revenue-graph"></div>

                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <ul class="bar-legend">
                                <li><span class="blue"></span> Conversión al Total de Posibles Ganadores</li>
                                <li><span class="red"></span> Conversion al Total de Enviados</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--more statistics box end-->
        </div>
     </div>

     {{--Empieza tabla--}}
     <div class="row">
        <div class="col-sm-12">
          <section class="panel">
            <header class="panel-heading">
                Todas las campañas
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                 </span>
            </header>
          <div class="panel-body">
            <div class="adv-table">
              <section id="unseen" class="panel">
                <table class="display table table-bordered" id="hidden-table-info">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Fecha</th>
                      <th style="display: none;">Gerencia</th>
                      <th style="display: none;">Límite de ganadores</th>
                      <th style="display: none;">Participantes</th>
                      <th>Editar</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($campanias as $campania)
                    <tr>
                        <td><a href="{{ URL::to('campanias/id', $campania->id) }}">{{ $campania->nombre }}</a></td>
                        <td>{{ $campania->created_at }}</td>
                        <td style="display: none;">{{ $campania->gerencia }}</td>
                        {{--Quiero mostrar acá los que ya hicieron click--}}
                        <td style="display: none;">{{ $campania->limite }}</td>
                        <td style="display: none;">{{ $campania->participante->count() }}</td>
                        <td class="center">
                        <a href="{{ URL::to('campanias/editar', $campania->id) }}" class="btn btn-info btn-xs" title="Editar"><span class="fa fa-pencil"></span></a>
                        </td>
                        <td class="center"><span class="label label-success">Activa</span></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </section>
            </div>
          </div>
          </section>
        </div>
      </div>
        {{--Termina Tabla--}}
      <table class="table table-striped">
  	    <tr>
  	        <th>Nombre</th>
  	        <th>Gerencia</th>
  	        <th>Límite de ganadores</th>
            <th>Participantes</th>
            <th>Acciones</th>
  	    </tr>
  	    @foreach ($campanias as $campania)
  	    <tr>
  	        <td><a href="{{ URL::to('campanias/id', $campania->id) }}">{{ $campania->nombre }}</a></td>
  	        <td>{{ $campania->gerencia }}</td>
            {{--Quiero mostrar acá los que ya hicieron click--}}
  	        <td>{{ $campania->limite }}</td>
            <td>{{ $campania->participante->count() }}</td>
            <td> <a href="{{ URL::to('campanias/editar', $campania->id) }}" class="btn btn-primary">Editar</a>
            <!-- borrar nerd (usa el metodo destroy de DESTROY /nerds/{id} -->
              {{ Form::open(array('url' => 'campanias/borrar/' . $campania->id, 'class' => 'pull-right')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit('Borrar Campaña', array('class' => 'btn btn-danger')) }}
              {{ Form::close() }}
              {{ Form::open(array('url' => 'campanias/vaciar/' . $campania->id, 'class' => 'pull-right')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit('Vaciar Campaña', array('class' => 'btn btn-warning')) }}
              {{ Form::close() }}
            </td>
  	    </tr>
  	    @endforeach
  	  </table>   
    </div>
@endsection