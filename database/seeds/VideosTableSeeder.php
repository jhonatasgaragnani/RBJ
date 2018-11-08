<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videos')->delete();
        
        \DB::table('videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'title' => 'Leilão',
                'description' => 'Recente leilão do senhor bom jesus',
                'thumb' => '/photos//thumbs/15.jpg',
                'video' => '<p><video controls="controls" width="300" height="150">
<source src="/files/videos/leilao.mp4" type="video/mp4" /></video></p>',
                'created_at' => '2017-07-30 20:01:47',
                'updated_at' => '2017-08-01 23:13:22',
                'deleted_at' => '2017-08-01 23:13:22',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'title' => 'Dua Lipa - Be The One',
            'description' => 'Dua Lipa - Be The One (BBC Music Sound Of 2016)',
                'thumb' => '/photos//thumbs/Dua_lipa_be_the_one.jpg',
                'video' => '<p><iframe src="//www.youtube.com/embed/rPbJzPjRkZ0" width="560" height="314" allowfullscreen="allowfullscreen"></iframe></p>',
                'created_at' => '2017-08-04 12:32:36',
                'updated_at' => '2017-08-08 09:23:52',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'title' => 'Despacito',
                'description' => 'Vevo Video',
                'thumb' => '/photos//thumbs/17426258_1772349759747651_8064794164004148780_n.jpg',
                'video' => '<p><iframe src="//www.youtube.com/embed/kJQP7kiw5Fk" width="560" height="314" allowfullscreen="allowfullscreen"></iframe></p>',
                'created_at' => '2017-08-11 11:06:35',
                'updated_at' => '2017-08-11 11:09:41',
                'deleted_at' => '2017-08-11 11:09:41',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'title' => 'Solo Dance - Martin Jensen',
                'description' => 'Solo Dance - Martin Jensen',
                'thumb' => '/photos//thumbs/maxresdefault.jpg',
                'video' => '<p><iframe src="//www.youtube.com/embed/826kv4IQSd4" width="560" height="314" allowfullscreen="allowfullscreen"></iframe>Adicione o video usando o gerenciador de midia. Altura recomendada: 560 x 314</p>',
                'created_at' => '2017-08-11 20:07:16',
                'updated_at' => '2017-08-11 20:07:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}