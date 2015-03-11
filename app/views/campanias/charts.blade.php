@extends ('layout.general')
@section ('content')
<script>
var data = JSON.parse('{{ $datos }}');
var uno = data.valor1;
var dos = data.valor2;
</script>
<!-- page heading start-->
<div class="page-heading">
    <h3>Pastel</h3>
</div>
<!-- page heading end-->
<!--body wrapper start-->
<div class="wrapper">
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
                          <li><span class="green"></span> Click rate</li>
                          <li><span class="purple"></span> Share rate</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <!--more statistics box end-->
  </div>
</div>
<!--body wrapper end-->
@endsection