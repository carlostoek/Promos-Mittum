@extends ('layout.general')
@section ('content')
<script>
var data = JSON.parse('{{ $datos }}');
var uno = data.valor1;
var dos = data.valor2;
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
                            <div class="value">{{ $participantesOk }}</div>
                            <div class="title"> Felices Ganadores</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <div class="panel green">
                        <div class="symbol">
                            <i class="fa fa-coffee"></i>
                        </div>
                        <div class="state-value">
                            <div class="value">78</div>
                            <div class="title"> Tazas de Café {{--Programando éste Sistema--}}</div>
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
                                <li><span class="green"></span> Usuarios sin ganar</li>
                                <li><span class="purple"></span> Ganadores</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--more statistics box end-->
        </div>
    </div>
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