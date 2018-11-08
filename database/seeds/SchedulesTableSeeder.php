<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('schedules')->delete();
        
        \DB::table('schedules')->insert(array (
            0 => 
            array (
                'id' => '1',
                'speaker' => 'Divino Roberto',
                'name' => 'Café da Manhã',
                'description' => '<p>Programa caf&eacute; da manh&atilde;</p>',
                'image' => '/photos/programas/cafe_da_manha.jpg',
                'thumb' => '/photos/programas/cafe_da_manha.jpg',
                'created_at' => '2017-07-30 19:34:17',
                'updated_at' => '2017-07-30 19:34:17',
            ),
            1 => 
            array (
                'id' => '2',
                'speaker' => 'Divino Roberto',
                'name' => 'Bau de Sucesso',
                'description' => '<p>Programa ba&uacute; de sucessos</p>',
                'image' => '/photos/programas/bau_de_sucessos.jpg',
                'thumb' => '/photos/programas/bau_de_sucessos.jpg',
                'created_at' => '2017-07-30 19:36:18',
                'updated_at' => '2017-07-30 19:36:18',
            ),
            2 => 
            array (
                'id' => '3',
                'speaker' => 'Carlos Silva',
            'name' => 'Grande Alegria (1º parte)',
                'description' => '<p>Programa grande alegria</p>
<p>&nbsp;</p>',
                'image' => '/photos/programas/grande_alegria.jpg',
                'thumb' => '/photos/programas/grande_alegria.jpg',
                'created_at' => '2017-07-30 19:38:12',
                'updated_at' => '2017-07-30 19:38:12',
            ),
            3 => 
            array (
                'id' => '4',
                'speaker' => 'Carlos Silva',
                'name' => 'Pastoral da Criança',
                'description' => '<p>Programa pastoral da crian&ccedil;a</p>',
                'image' => '/photos/programas/pastoral-da-crianca.jpg',
                'thumb' => '/photos/programas/pastoral-da-crianca.jpg',
                'created_at' => '2017-07-30 19:39:39',
                'updated_at' => '2017-07-30 19:39:39',
            ),
            4 => 
            array (
                'id' => '5',
                'speaker' => 'Adriana Diniz & Carlos Silva',
                'name' => 'Fala Cidade',
                'description' => '<p>Programa fala cidade</p>',
                'image' => '/photos/programas/fala_cidade.jpg',
                'thumb' => '/photos/programas/fala_cidade.jpg',
                'created_at' => '2017-07-30 19:40:58',
                'updated_at' => '2017-07-30 19:40:58',
            ),
            5 => 
            array (
                'id' => '6',
                'speaker' => 'Guilherme Filho',
                'name' => 'Manhã Total',
                'description' => '<p>Programa manha total</p>',
                'image' => '/photos/programas/manha_total.jpg',
                'thumb' => '/photos/programas/manha_total.jpg',
                'created_at' => '2017-07-30 19:42:29',
                'updated_at' => '2017-07-30 19:42:29',
            ),
            6 => 
            array (
                'id' => '7',
                'speaker' => 'Padre Reginaldo Manzotti',
                'name' => 'Experiência de DEUS',
                'description' => '<p>Programa experiencia de deus</p>',
                'image' => '/photos/programas/experiencia_de_deus.jpg',
                'thumb' => '/photos/programas/experiencia_de_deus.jpg',
                'created_at' => '2017-07-30 19:43:52',
                'updated_at' => '2017-07-30 19:43:52',
            ),
            7 => 
            array (
                'id' => '8',
                'speaker' => 'Equipe de Esporte RBJ',
                'name' => 'Giro Esportivo',
                'description' => '<p>Programa giro esportivo</p>',
                'image' => '/photos/programas/giro_esportivo.jpg',
                'thumb' => '/photos/programas/giro_esportivo.jpg',
                'created_at' => '2017-07-30 19:50:42',
                'updated_at' => '2017-07-30 19:50:42',
            ),
        ));
        
        
    }
}