@extends ('layout.general')
@section ('content')

	<div class="page-heading">
    	<h2>Campañas</h2>
	</div>
    <!-- page heading end-->

    <!--body wrapper start-->
    <div class="wrapper">
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