<?php

use Illuminate\Database\Seeder;

class PollsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('polls')->delete();
        
        \DB::table('polls')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Teste',
                'question' => 'Você gostou do novo site ?',
                'active' => '1',
                'created_at' => '2017-07-30 18:34:44',
                'updated_at' => '2017-07-30 18:34:44',
            ),
        ));
        
        
    }
}