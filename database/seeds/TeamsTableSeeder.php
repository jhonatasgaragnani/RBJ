<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Lidiane Cristina',
                'role' => 'Secretária',
                'image' => '/photos//1.jpg',
                'thumb' => '/photos//thumbs/1.jpg',
                'created_at' => '2017-07-30 19:02:34',
                'updated_at' => '2017-08-12 15:03:49',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Adriana Diniz',
                'role' => 'Locutora',
                'image' => '/photos//20525855_1819790778351634_4567154865406334126_n.jpg',
                'thumb' => '/photos//thumbs/20525855_1819790778351634_4567154865406334126_n.jpg',
                'created_at' => '2017-07-30 19:02:56',
                'updated_at' => '2017-08-12 15:03:55',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Guilherme Filho',
                'role' => 'Locutor',
                'image' => '/photos//14358858_1788231398127677_9087219763514070708_n.jpg',
                'thumb' => '/photos//thumbs/14358858_1788231398127677_9087219763514070708_n.jpg',
                'created_at' => '2017-07-30 19:03:31',
                'updated_at' => '2017-08-12 15:04:16',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Divino Roberto',
                'role' => 'Locutor',
                'image' => '/photos//2.jpg',
                'thumb' => '/photos//thumbs/2.jpg',
                'created_at' => '2017-07-30 19:04:00',
                'updated_at' => '2017-08-10 15:54:13',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Carlos Silva',
                'role' => 'Locutor',
                'image' => '/photos//5.jpg',
                'thumb' => '/photos//thumbs/5.jpg',
                'created_at' => '2017-07-30 19:04:21',
                'updated_at' => '2017-08-10 15:54:52',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Fernando Barreto',
                'role' => 'Locutor',
                'image' => '/photos//18740501_1674500639525795_18815278984063911_n.jpg',
                'thumb' => '/photos//thumbs/18740501_1674500639525795_18815278984063911_n.jpg',
                'created_at' => '2017-07-30 19:04:44',
                'updated_at' => '2017-08-12 15:04:36',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Marcio Martins',
                'role' => 'Locutor',
                'image' => '/photos//15085525_1113075778747756_433207853497313579_n.jpg',
                'thumb' => '/photos//thumbs/15085525_1113075778747756_433207853497313579_n.jpg',
                'created_at' => '2017-07-30 19:05:11',
                'updated_at' => '2017-08-10 15:56:44',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'Ze Do Prado Sudam Prado',
                'role' => 'Locutor',
                'image' => '/photos//3.jpg',
                'thumb' => '/photos//thumbs/3.jpg',
                'created_at' => '2017-07-30 19:05:30',
                'updated_at' => '2017-08-10 15:57:22',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'Kheronn S B Machado',
                'role' => 'Locutor',
                'image' => '/photos//16105649_10202589647299523_1840377191305889411_n.jpg',
                'thumb' => '/photos//thumbs/16105649_10202589647299523_1840377191305889411_n.jpg',
                'created_at' => '2017-07-30 19:06:53',
                'updated_at' => '2017-08-10 15:58:19',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => 'Jose Carlos Machado',
                'role' => 'Locutor',
                'image' => '/photos//4.jpg',
                'thumb' => '/photos//thumbs/4.jpg',
                'created_at' => '2017-08-10 15:59:21',
                'updated_at' => '2017-08-10 15:59:21',
            ),
            10 => 
            array (
                'id' => '11',
                'name' => 'Batista Martins',
                'role' => 'Locutor',
                'image' => '/photos//locutor_padr__o.png',
                'thumb' => '/photos//thumbs/locutor_padr__o.png',
                'created_at' => '2017-08-10 16:00:26',
                'updated_at' => '2017-08-10 16:00:26',
            ),
        ));
        
        
    }
}