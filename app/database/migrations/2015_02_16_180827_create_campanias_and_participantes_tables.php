<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaniasAndParticipantesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campanias', function(Blueprint $table)
		{
			$table->increments('id');   //Campo incremental que será usado como clave
            $table
            	->string('nombre')	//Campo de tipo cadena varchar(255)
            	->unique();   				//Campo unico
            $table->string('gerencia');   //Campo de tipo cadena varchar(255)
            $table->string('limite');   //Campo de tipo cadena varchar(255)
            $table->timestamps();       //Creará dos campos, create_at y update_at
		});
 
		Schema::create('participantes', function(Blueprint $table) {
			$table->increments('id');   //Campo incremental que será usado como clave
            $table
                ->integer('campania_id')   //creamos un entero
                ->unsigned();               //sin signo
            $table
                ->foreign('campania_id')   //creamos la clave foránea
                ->references('id')          //asociada al campo id
                ->on('campanias')          //De la tabla campania
                ->onDelete('cascade');      //y que tenga borrado en cascada
            $table->string('correo');   //Campo de tipo cadena varchar(255)
            $table->string('nombre')   //Campo de tipo cadena varchar(255)
            	->nullable();
            $table
            	->boolean('click')		//Campo de tipo boleano
            	->default(false);   		// por defecto falso
            $table->timestamps();       //Creará dos campos, create_at y update_at
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campanias');
		Schema::drop('participantes');
	}

}
