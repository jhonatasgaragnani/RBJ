<?php

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('days')->delete();
        
        \DB::table('days')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Domingo',
                'created_at' => '2017-07-30 18:34:26',
                'updated_at' => '2017-07-30 18:34:26',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Segunda-Feira',
                'created_at' => '2017-07-30 18:34:28',
                'updated_at' => '2017-07-30 18:34:28',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Terça-Feira',
                'created_at' => '2017-07-30 18:34:30',
                'updated_at' => '2017-07-30 18:34:30',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Quarta-Feira',
                'created_at' => '2017-07-30 18:34:31',
                'updated_at' => '2017-07-30 18:34:31',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Quinta-Feira',
                'created_at' => '2017-07-30 18:34:32',
                'updated_at' => '2017-07-30 18:34:32',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Sexta-Feira',
                'created_at' => '2017-07-30 18:34:34',
                'updated_at' => '2017-07-30 18:34:34',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Sábado',
                'created_at' => '2017-07-30 18:34:36',
                'updated_at' => '2017-07-30 18:34:36',
            ),
        ));
        
        
    }
}