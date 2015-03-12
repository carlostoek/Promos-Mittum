<?php

class CampaniasController extends \BaseController {

	// Mostramos campañas index
	public function actionVerCampanias()
	{	
		// Tomamos todas las campañas
		$campanias = Campania::orderBy('id', 'DESC')->get();
		// Tomamos todos los participantes
		$participantes = Participante::all();
		// Capturamos sólo los que ya dieron clic
		$participantesOk = Participante::where('click', 1)->count();
		// Sumamos los posibles ganadores
		$sumaPosibles = Campania::select('limite',
      \DB::raw('SUM(limite) as limite'))
      ->first();
		// Aquí pasar los datos para el pay round($participantesOk / $sumaPosibles->limite, 2);
    $valor1 = round($participantesOk * 100 / $sumaPosibles->limite);
    $valor2 = round($participantesOk * 100 / $participantes->count());
		$datos = json_encode(array('valor1' => $valor1, 'valor2' => $valor2, 'formatted1' => $valor1.'%', 'formatted2' => $valor2.'%'));
		// Llamamos vista y pasamos variables
		return View::make('campanias/index', compact('campanias', 'participantes', 'participantesOk', 'datos', 'sumaPosibles', 'valor2'));
	}

	// Mostramos detalles de campaña según ID
	public function actionVerPorCampania($id)
	{
		$campania = Campania::find($id);
		$participantesOk = Participante::where('campania_id', $id)
		  ->where('click', 1)
			->count();
		return View::make('campanias/ver', compact('campania', 'participantesOk'));
	}

	// Mostrar Crear Campaña
	public function actionCrear()
	{	
		return View::make('campanias/crear');
	}

	// Procesar datos y guardar campaña
	public function actionCrearCampania()
	{
		$rules = array(
      'nombre' =>   'required|unique:campanias',
			'gerencia' => 'required',
			'limite' =>   'required',
      );
        
    $validador = Validator::make(Input::all(), $rules);

		if ($validador->fails()) {
      return Redirect::to('campanias/crear')
        ->withErrors($validador)
        ->withInput(Input::except('contrasenia'));
    }

		$campania=new Campania;

		$campania->nombre   = Input::get('nombre');
		$campania->gerencia = Input::get('gerencia');
		$campania->limite   = Input::get('limite');
		$campania->url_ok   = Input::get('url_ok');

		$campania->save();

		return Redirect::to('campanias/id/'.$campania->id);
	}

	// Subir archivo e insertar registros
	public function actionProcesarArchivo()
	{
		// subir el archivo y moverlo concervando su nombre
		$id_camp = Input::get('id');
		$nombre = Input::file('libro')->getClientOriginalName();
		Input::file('libro')->move('\xampp\htdocs\promos\public\subidas', $nombre);

		Excel::load('public/subidas/'.$nombre, function ($archivo){
			
			$result=$archivo->all();
			// echo $result[0]->count().'<br>'.$id_camp;

			foreach ($result[0] as $key => $value) {
				$participante =new Participante;
				$participante->campania_id = Input::get('id');;
				$participante->nombre      = $value->nombre;
				$participante->correo      = $value->correo;
				$participante->click       = false;
				
				$participante->save();
				}
		});
		return Redirect::to('campanias/id/'.$id_camp);
	}

	// Editar campaña
	public function actionEditar($id)
	{
		$campania = Campania::find($id);
		if (is_null ($campania))
		{
		App::abort(404);
		}

		return View::make('campanias/editar')->with('campania', $campania);
	}

	// Update campaña
	public function actionUpdate($id)
	{
		$campania = Campania::find($id);
		if (is_null ($campania))
		{
		App::abort(404);
		}
		// Obtenemos la data del usuario
		$datos = Input::all();

		// Guardamos
		$campania->nombre   = Input::get('nombre');
		$campania->gerencia = Input::get('gerencia');
		$campania->limite   = Input::get('limite');
		$campania->url_ok   = Input::get('url_ok');

		$campania->save();

		return Redirect::to('campanias');
	}

	// Borrar campaña y participantes
	public function actionBorrarCampania($id)
	{
		 $campania = Campania::find($id);
		 $campania->participante()->delete();
		 $campania->delete(); 
		 return Redirect::to('campanias');
	}

	// Borrar sólo participantes
	public function actionBorrarParticipantes($id)
	{
		 $campania = Campania::find($id);
		 $campania->participante()->delete();
		 return Redirect::to('campanias');
	}



	/*
	*Desde acá son sólo pruebas
	*/

	// Mostrar subir archivos
	public function actionCharts()
	{
		/*$datos = array(
			'Uno'=>'hola',
			'Dos'=>'como',
			'Tres'=>'estas',
			'Cuatro'=>'tu'
			);*/
		$hola = '20';
		// $datos = $campania = Campania::first();
		$datos = json_encode(array('valor1' => '80', 'valor2' => $hola, 'formatted1' => '80%', 'formatted2' => '20%'));
		/*$algo = 20;*/
		// return $datos;
		return View::make('campanias/charts', compact('datos', 'hola'));
		 // return var_dump(json_decode($datos, true));
	}

	public function actionSuma()
	{
		$suma = Campania::select('limite',
      \DB::raw('SUM(limite) as limite'))
      ->first();
    return $suma->limite;
	}
}