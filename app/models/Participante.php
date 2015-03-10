<?php 

class Participante extends Eloquent
{

	protected $table='participantes';
	protected $primaryKey='id';

	public function campania()
    {
        return $this->belongsTo('Campania');
    }
}