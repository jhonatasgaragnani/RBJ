<?php

use Illuminate\Database\Seeder;

class TopsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tops')->delete();
        
        \DB::table('tops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'artist' => 'Jorge e Matheus',
                'title' => 'Sosseguei',
                'music' => 'https://www.youtube.com/watch?v=62gOogC2ZTU',
                'position' => 3,
                'created_at' => '2017-07-30 18:34:25',
                'updated_at' => '2017-07-30 19:20:22',
            ),
            1 => 
            array (
                'id' => 2,
                'artist' => 'Ed Sheeran',
                'title' => 'Shape of You',
                'music' => 'https://www.youtube.com/watch?v=JGwWNGJdvx8',
                'position' => 7,
                'created_at' => '2017-07-30 18:34:25',
                'updated_at' => '2017-07-30 19:22:43',
            ),
            2 => 
            array (
                'id' => 3,
                'artist' => 'Anitta',
                'title' => 'Paradinha',
                'music' => 'https://www.youtube.com/watch?v=-73pafJ9RFg',
                'position' => 2,
                'created_at' => '2017-07-30 18:34:25',
                'updated_at' => '2017-08-10 20:30:57',
            ),
            3 => 
            array (
                'id' => 4,
            'artist' => 'Naiara Azevedo -  part. Ivete Sangalo (DVD Contraste)',
                'title' => 'Avisa Que eu Cheguei',
                'music' => 'https://www.youtube.com/watch?v=Ke-w7E9ZGAo',
                'position' => 6,
                'created_at' => '2017-07-30 18:34:25',
                'updated_at' => '2017-08-10 20:34:14',
            ),
            4 => 
            array (
                'id' => 5,
                'artist' => 'Ludmilla',
                'title' => 'Cheguei',
                'music' => 'https://www.youtube.com/watch?v=RNVLCr-Y7rQ',
                'position' => 5,
                'created_at' => '2017-07-30 18:34:25',
                'updated_at' => '2017-08-10 20:31:47',
            ),
            5 => 
            array (
                'id' => 6,
                'artist' => 'Justin Bieber –  ft. Luis Fonsi & Daddy Yankee [Pop]',
                'title' => 'Despacito',
                'music' => 'https://www.youtube.com/watch?v=72UO0v5ESUo',
                'position' => 1,
                'created_at' => '2017-07-30 18:34:25',
                'updated_at' => '2017-08-11 20:10:16',
            ),
            6 => 
            array (
                'id' => 7,
                'artist' => 'Gustavo Lima',
                'title' => 'Homem de Família',
                'music' => 'https://www.youtube.com/watch?v=Vz9EXeF01A8',
                'position' => 10,
                'created_at' => '2017-07-30 18:34:26',
                'updated_at' => '2017-07-30 19:24:43',
            ),
            7 => 
            array (
                'id' => 8,
                'artist' => 'Maiara & Maraisa com Marília Mendonça',
                'title' => 'Festas das Patroas',
                'music' => 'https://www.youtube.com/watch?v=RCuXwZqe5-c',
                'position' => 9,
                'created_at' => '2017-07-30 18:34:26',
                'updated_at' => '2017-07-30 19:24:11',
            ),
            8 => 
            array (
                'id' => 9,
                'artist' => 'Nego do Boreu com Part. Anitta e Wesley Safadão',
                'title' => 'Você Partiu meu Coração',
                'music' => 'https://www.youtube.com/watch?v=Xp-dKdSUuLk',
                'position' => 8,
                'created_at' => '2017-07-30 18:34:26',
                'updated_at' => '2017-07-30 19:23:30',
            ),
            9 => 
            array (
                'id' => 10,
                'artist' => 'Roberto Carlos & Jennifer Lopes',
                'title' => 'Chegaste',
                'music' => 'https://www.youtube.com/watch?v=3qMB87JndxQ',
                'position' => 4,
                'created_at' => '2017-07-30 18:34:26',
                'updated_at' => '2017-07-30 19:21:03',
            ),
        ));
        
        
    }
}