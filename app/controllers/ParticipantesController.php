<?php

class ParticipantesController extends \BaseController {

	public function actionClicAcepta()
	{
		$campania_id  = Input::get('camp');
		$correo       = Input::get('correo');
		$campania     = Campania::find($campania_id);
		$participante = Participante::where('campania_id', $campania_id)
			->where('correo', $correo)
			->first();
		$ganadoresActual= Participante::where('campania_id', $campania_id)
			->where('click', 1)
			->get();
		// return $participante;
		// Comprobamos que exista en la base de datos
		if($participante == null){
	   	return 'No existes en nuestra base de datos :(';
		}else {
			// si ya participó se le avisa
			if ($ganadoresActual->count() >= $campania->limite) {
				$participante->click=true;
				$participante->save();
				return 'Lo siento, se terminaron los boletos :(';
			// Verificamos si aún hay espacio para más ganadores
			}else if ($participante->click >= 1){
				return '¡Ya estás participando! :)';
			// si existe ahora comprobamos su estado, si no ha participado se modifica y redirecciona
			}else{
				$participante->click=1;
				$participante->save();
				return Redirect::to($campania->url_ok);
			}
		}
	}
}
