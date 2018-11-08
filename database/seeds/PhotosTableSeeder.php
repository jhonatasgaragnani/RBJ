<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photos')->delete();
        
        \DB::table('photos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'title' => 'Festa do senhor Bom Jesus da Cana Verde',
                'description' => 'Festa 1',
                'alt' => 'Festa do senhor Bom Jesus da Cana Verde',
                'image' => '/photos/festa/15.jpg',
                'thumb' => '/photos/festa/thumbs/15.jpg',
                'created_at' => '2017-07-30 20:09:15',
                'updated_at' => '2017-08-01 23:06:20',
                'deleted_at' => '2017-08-01 23:06:20',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'title' => 'Festa do senhor Bom Jesus da Cana Verde',
                'description' => 'Festa 2',
                'alt' => 'Festa do senhor Bom Jesus da Cana Verde',
                'image' => '/photos/festa/9.jpg',
                'thumb' => '/photos/festa/thumbs/9.jpg',
                'created_at' => '2017-07-30 20:09:37',
                'updated_at' => '2017-07-30 20:09:37',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'title' => 'Festa do senhor Bom Jesus da Cana Verde',
                'description' => 'Festa 3',
                'alt' => 'Festa do senhor Bom Jesus da Cana Verde',
                'image' => '/photos/festa/19601608_999217293554024_582752278402861656_n.jpg',
                'thumb' => '/photos/festa/thumbs/19601608_999217293554024_582752278402861656_n.jpg',
                'created_at' => '2017-07-30 20:11:10',
                'updated_at' => '2017-07-30 20:11:10',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'title' => 'Por do sol',
                'description' => 'Por do sol',
                'alt' => 'Por do sol',
                'image' => '/photos/belezas/11.jpg',
                'thumb' => '/photos/belezas/thumbs/11.jpg',
                'created_at' => '2017-07-30 20:12:29',
                'updated_at' => '2017-07-30 20:12:29',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'title' => 'Vida no interior',
                'description' => 'Vida no interior',
                'alt' => 'Vida no interior',
                'image' => '/photos/belezas/12006232_1459266644404051_2606204716723412982_n.jpg',
                'thumb' => '/photos/belezas/thumbs/12006232_1459266644404051_2606204716723412982_n.jpg',
                'created_at' => '2017-07-30 20:12:54',
                'updated_at' => '2017-08-01 23:12:05',
                'deleted_at' => '2017-08-01 23:12:05',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 2,
                'title' => 'Noveninha das crianças!',
                'description' => '86º Festa do Senhor Bom Jesus da Cana Verde',
                'alt' => '#BomJesusFM',
                'image' => '/photos//20525870_715985608611100_8739045319021296378_n.jpg',
                'thumb' => '/photos//thumbs/20525870_715985608611100_8739045319021296378_n.jpg',
                'created_at' => '2017-08-03 21:09:11',
                'updated_at' => '2017-08-08 09:39:10',
                'deleted_at' => '2017-08-08 09:39:10',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 2,
                'title' => 'Equipe de Esporte do RBJ',
                'description' => 'Carlos Silva, Adriana Diniz, José Carlos Machado',
                'alt' => 'Giro Esportivo',
                'image' => '/photos//esporte.jpg',
                'thumb' => '/photos//thumbs/esporte.jpg',
                'created_at' => '2017-08-10 20:45:42',
                'updated_at' => '2017-08-10 20:45:42',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 2,
                'title' => 'Fala Cidade - Entrevista',
                'description' => 'Com Gilmara - Personal Trainer',
                'alt' => 'Entrevista',
                'image' => '/photos//17202812_1737295633267816_9193741923992623269_n.jpg',
                'thumb' => '/photos//thumbs/17202812_1737295633267816_9193741923992623269_n.jpg',
                'created_at' => '2017-08-10 21:07:03',
                'updated_at' => '2017-08-10 21:07:03',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}