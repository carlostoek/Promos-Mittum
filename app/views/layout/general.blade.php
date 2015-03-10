@include ('layout.cabeza')
@include ('layout.left')

<section>
     
    <!-- main content start-->
    <div class="main-content" >

		@include ('layout.headerSection')
        @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Por favor corrige los siguentes errores:</strong>
              <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
            </div>
          @endif

		@yield('content')

    </div>
    <!-- main content end-->
</section>

@include ('layout.pies')