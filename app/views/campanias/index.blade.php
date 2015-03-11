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
            DataTables hidden row details example
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
        <div class="panel-body">
        <div class="adv-table">
        <table class="display table table-bordered" id="hidden-table-info">
        <thead>
        <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th class="hidden-phone">Platform(s)</th>
            <th class="hidden-phone">Engine version</th>
            <th class="hidden-phone">CSS grade</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX">
            <td>Trident</td>
            <td>Internet
                Explorer 4.0</td>
            <td class="hidden-phone">Win 95+</td>
            <td class="center hidden-phone">4</td>
            <td class="center hidden-phone">X</td>
        </tr>
        <tr class="gradeA">
            <td>Trident</td>
            <td>Internet
                Explorer 5.0</td>
            <td class="hidden-phone">Win 95+</td>
            <td class="center hidden-phone">5</td>
            <td class="center hidden-phone">A</td>
        </tr>
        <tr class="gradeA">
            <td>Trident</td>
            <td>Internet
                Explorer 5.5</td>
            <td class="hidden-phone">Win 95+</td>
            <td class="center hidden-phone">5.5</td>
            <td class="center hidden-phone">A</td>
        </tr>
        <tr class="gradeC">
            <td>KHTML</td>
            <td>Konqureror 3.1</td>
            <td class="hidden-phone">KDE 3.1</td>
            <td class="center hidden-phone">3.1</td>
            <td class="center hidden-phone">C</td>
        </tr>
        <tr class="gradeA">
            <td>KHTML</td>
            <td>Konqureror 3.3</td>
            <td class="hidden-phone">KDE 3.3</td>
            <td class="center hidden-phone">3.3</td>
            <td class="center hidden-phone">A</td>
        </tr>
        <tr class="gradeX">
            <td>Tasman</td>
            <td>Internet Explorer 4.5</td>
            <td class="hidden-phone">Mac OS 8-9</td>
            <td class="center hidden-phone">-</td>
            <td class="center hidden-phone">X</td>
        </tr>
        <tr class="gradeC">
            <td>Tasman</td>
            <td>Internet Explorer 5.1</td>
            <td class="hidden-phone">Mac OS 7.6-9</td>
            <td class="center hidden-phone">1</td>
            <td class="center hidden-phone">C</td>
        </tr>
        <tr class="gradeC">
            <td>Tasman</td>
            <td>Internet Explorer 5.2</td>
            <td class="hidden-phone">Mac OS 8-X</td>
            <td class="center hidden-phone">1</td>
            <td class="center hidden-phone">C</td>
        </tr>
        <tr class="gradeA">
            <td>Misc</td>
            <td>NetFront 3.1</td>
            <td>Embedded devices</td>
            <td class="center">-</td>
            <td class="center">C</td>
        </tr>
        <tr class="gradeA">
            <td>Misc</td>
            <td>NetFront 3.4</td>
            <td class="hidden-phone">Embedded devices</td>
            <td class="center hidden-phone">-</td>
            <td class="center hidden-phone">A</td>
        </tr>
        <tr class="gradeX">
            <td>Misc</td>
            <td>Lynx</td>
            <td>Text only</td>
            <td class="center">-</td>
            <td class="center">X</td>
        </tr>
        <tr class="gradeC">
            <td>Misc</td>
            <td>IE Mobile</td>
            <td class="hidden-phone">Windows Mobile 6</td>
            <td class="center hidden-phone">-</td>
            <td class="center hidden-phone">C</td>
        </tr>
        <tr class="gradeC">
            <td>Misc</td>
            <td>PSP browser</td>
            <td class="hidden-phone">PSP</td>
            <td class="center hidden-phone">-</td>
            <td class="center hidden-phone">C</td>
        </tr>
        <tr class="gradeU">
            <td>Other browsers</td>
            <td>All others</td>
            <td class="hidden-phone">-</td>
            <td class="center hidden-phone">-</td>
            <td class="center hidden-phone">U</td>
        </tr>
        </tbody>
        </table>

        </div>
        </div>
        </section>
        </div>
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