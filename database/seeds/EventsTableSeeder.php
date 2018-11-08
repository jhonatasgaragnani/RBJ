<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'active' => 1,
                'title' => '86º Festa do Senhor Bom Jesus da Cana Verde!',
                'body' => '<p>86&ordm; Festa do Senhor Bom Jesus da Cana Verde!</p>',
                'image' => '/photos//19601608_999217293554024_582752278402861656_n.jpg',
                'thumb' => '/photos//thumbs/19601608_999217293554024_582752278402861656_n.jpg',
                'meta_description' => NULL,
                'meta_title' => '86º Festa do Senhor Bom Jesus da Cana Verde!',
                'meta_keywords' => NULL,
                'deleted_at' => '2017-08-08 09:35:05',
                'happen_at' => '2017-08-08 09:32:50',
                'created_at' => '2017-08-04 12:31:05',
                'updated_at' => '2017-08-08 09:35:05',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'active' => 1,
                'title' => 'Feriado Nacional',
                'body' => '<p>7 de Setembro.</p>',
                'image' => '/photos//Sete-de-Setembro-rio-preto.jpg',
                'thumb' => '/photos//thumbs/Sete-de-Setembro-rio-preto.jpg',
                'meta_description' => NULL,
                'meta_title' => 'Feriado Nacional',
                'meta_keywords' => NULL,
                'deleted_at' => NULL,
                'happen_at' => '2017-09-07 09:37:39',
                'created_at' => '2017-08-08 09:37:39',
                'updated_at' => '2017-08-08 09:37:39',
            ),
        ));
        
        
    }
}