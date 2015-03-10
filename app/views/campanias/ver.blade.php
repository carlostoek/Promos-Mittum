@extends ('layout.general')
@section ('content')

<!-- page heading start-->
<div class="page-heading">
    <h2>{{ $campania->nombre }} con ID {{ $campania->id }}</h2>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    @if ( !$campania->participante->count() )
        No hay participantes
        <form action="{{ url('campanias/procesar') }}"
        method="POST"
        enctype="multipart/form-data">

        <input type="file" name="libro" />
        <input type="hidden" name="id" value="{{ $campania->id }}"/>
        <input type="submit">
        </form>
    @else
    En este proyecto hay un total de <strong>{{ $campania->participante->count() }}</strong> participantes y un límite de <strong>{{ $campania->limite }}</strong> ganadores, hasta el moneto hay <strong>{{ $participantesOk }}</strong> ganadores:<br><br>
      <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Dio click?</th>
      </tr>
      @foreach ($campania->participante as $participante)
      <tr>
        <td>{{ $participante->id }}</td>
        <td>{{ $participante->nombre }}</td>
        <td>{{ $participante->correo }}</td>
        @if ( $participante->click == 1 )
         <td>Si</td>
        @else
         <td>No</td>
        @endif
      </tr>
      @endforeach
    </table>

    @endif
 
    <p>
        {{ link_to('campanias', 'Regresar a Campañas') }} |
        {{  link_to('campanias.participantes.create', 'Crear Participante', $campania->nombre) }}
    </p>
</div>
<!--body wrapper end-->
@endsection