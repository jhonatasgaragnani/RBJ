<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Notícia',
                'slug' => 'news',
                'created_at' => '2017-07-30 18:34:24',
                'updated_at' => '2017-07-30 18:34:24',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Postagem',
                'slug' => 'post',
                'created_at' => '2017-07-30 18:34:24',
                'updated_at' => '2017-07-30 18:34:24',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Entrevista',
                'slug' => 'interview',
                'created_at' => '2017-07-30 18:34:24',
                'updated_at' => '2017-07-30 18:34:24',
            ),
        ));
        
        
    }
}