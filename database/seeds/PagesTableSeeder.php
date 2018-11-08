<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            ['Home', 'A página principal'],
            ['Schedule', 'Programação'],
            ['Schedule.Child', 'Programa'],
            ['News', 'Noticias'],
            ['News.Child', 'Noticia'],
            ['Interviews', 'Entrevistas'],
            ['Interviews.Child', 'Entrevistas'],
            ['Posts', 'Materias'],
            ['Posts.Child', 'Materias'],
            ['Events', 'Eventos'],
            ['Events.Child', 'Evento'],
            ['Gallery', 'Galeria de fotos'],
            ['Videos', 'Galeria de videos'],
            ['Team', 'A Equipe'],
            ['About', 'Sobre nós'],
            ['Chat', 'Mensagens'],
            ['Partners', 'Parceiros']
        ];

        foreach ($pages as $page) {
            \Admin\Models\Page::create([
                'name' => $page[0],
                'description' => $page[1]
            ]);
        }
    }
}
