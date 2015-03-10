<?php 

class Campania extends Eloquent
{
	protected $table='campanias';
	protected $primaryKey='id';

	public function participante()
    {
        return $this->hasMany('Participante');
    }
    
}