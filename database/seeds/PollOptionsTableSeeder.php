<?php

use Illuminate\Database\Seeder;

class PollOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('poll_options')->delete();
        
        \DB::table('poll_options')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Sim',
                'votes' => '0',
                'created_at' => '2017-07-30 18:55:29',
                'updated_at' => '2017-07-30 18:55:29',
                'poll_id' => '1',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Não',
                'votes' => '0',
                'created_at' => '2017-07-30 18:55:31',
                'updated_at' => '2017-07-30 18:55:31',
                'poll_id' => '1',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Com certeza',
                'votes' => '0',
                'created_at' => '2017-07-30 18:55:36',
                'updated_at' => '2017-07-30 18:55:36',
                'poll_id' => '1',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Não vi diferença',
                'votes' => '0',
                'created_at' => '2017-07-30 18:55:41',
                'updated_at' => '2017-07-30 18:55:41',
                'poll_id' => '1',
            ),
        ));
        
        
    }
}