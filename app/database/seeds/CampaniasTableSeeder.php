<?php
 
use Illuminate\Database\Seeder;
 
class CampaniasTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('campania')->delete();
 
        $campanias = array(
            ['id' => 1, 'nombre' => 'Proyecto-1', 'gerencia' => 'BNMX-1','limite' => '10', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'Proyecto-2', 'gerencia' => 'BNMX-2','limite' => '5', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'nombre' => 'Proyecto-3', 'gerencia' => 'BNMX-3','limite' => '15', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('campanias')->insert($campanias);
    }
 
}