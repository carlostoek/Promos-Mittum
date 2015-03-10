@extends ('layout.general')
@section ('content')
<h2>Campañas</h2>
 
    @if ( !$campania->count() )
        You have no projects
    @else
        <ul>
            @foreach( $campania as $campania )
                <li><a href="{{ route('campania.show', $campania->nombreCampania) }}">{{ $campania->nombreCampania }}</a></li>
            @endforeach
        </ul>
    @endif

        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->
@endsection