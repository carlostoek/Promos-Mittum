
{{--Para meter las acciones a la tabla de campañas--}}
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