<?php

namespace Admin\Observers;

use Admin\Models\Meta;
use Admin\Models\Page;
use Illuminate\Support\Facades\Log;

class PageObserver
{

    public function created(Page $page)
    {
        $metas = [
            ['title', 'Titulo padrão da pagina'],
            ['description', 'Descrição padrão da pagina']
        ];

        foreach ($metas as $meta) {
            $newMeta = new Meta([
                'name'  =>  $meta[0],
                'content' => $meta[1]
            ]);

            $page->metas()->save($newMeta);
        }
    }
}