<?php
 
use Illuminate\Database\Seeder;
 
class ParticipantesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('tasks')->delete();
 
        $participantes = array(
            ['id' => 1, 'correo' => 'alguien1@yahoo.com', 'nombre' => 'Nombre-1', 'campania_id' => 1, 'click' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'correo' => 'alguien2@yahoo.com', 'nombre' => 'Nombre-2', 'campania_id' => 1, 'click' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'correo' => 'alguien3@yahoo.com', 'nombre' => 'Nombre-3', 'campania_id' => 2, 'click' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'correo' => 'alguien4@yahoo.com', 'nombre' => 'Nombre-4', 'campania_id' => 1, 'click' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'correo' => 'alguien5@yahoo.com', 'nombre' => 'Nombre-5', 'campania_id' => 1, 'click' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'correo' => 'alguien6@yahoo.com', 'nombre' => 'Nombre-6', 'campania_id' => 2, 'click' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'correo' => 'alguien7@yahoo.com', 'nombre' => 'Nombre-7', 'campania_id' => 3, 'click' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'correo' => 'alguien8@yahoo.com', 'nombre' => 'Nombre-8', 'campania_id' => 3, 'click' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        //// Uncomment the below to run the seeder
        DB::table('participantes')->insert($participantes);
    }
 
}