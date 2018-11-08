<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'type_id' => 2,
                'active' => 1,
                'title' => 'Novena para Bom Jesus da Cana Verde',
            'body' => '<h4 class="m_2709871712504798307gmail-tituloNoticiaDet">Novena para Bom Jesus da Cana Verde come&ccedil;a quinta-feira (27)</h4>
<p>&nbsp;</p>
<p>Moradores de Siqueira Campos j&aacute; vivem o clima de um dos eventos mais tradicionais da regi&atilde;o: a festa em comemora&ccedil;&atilde;o ao padroeiro da cidade Bom Jesus da Cana Verde, que este ano est&aacute; em sua 86&ordf; edi&ccedil;&atilde;o.&nbsp; No &uacute;ltimo domingo. os fieis lotaram o Santu&aacute;rio do Senhor Bom Jesus para a missa e cerim&ocirc;nia da Troca do Manto da imagem do Senhor Bom Jesus da Cana Verde. A Santa Missa foi presidida pelo reitor do Santu&aacute;rio Frei Marcus Miranda e concelebrada por todos os freis da fraternidade. Quem estava na igreja ainda teve a oportunidade de levar para suas casas uma rel&iacute;quia do manto do Senhor Bom Jesus.</p>
<p>Tamb&eacute;m na semana passada, houve um leil&atilde;o de gado no recinto Corrida do Ouro, que faz parte das in&uacute;meras e importantes atividades que antecedem a festa do Senhor Bom Jesus da Cana Verde e que visam arrecadar fundos para o evento. Com o mesmo objetivo, organizadores come&ccedil;aram em abril uma arrecada&ccedil;&atilde;o de prendas, que ajudam na acolhida de romeiros e demais visitantes da festa, que ter&aacute; inicio dia 28 e s&oacute; termina dia 6 de agosto, data do padroeiro.</p>
<p>&nbsp;</p>
<p>A comiss&atilde;o organizadora estima que nos 10 dias de festividades religiosas e sociais, o evento deve receber cerca de 100 mil pessoas. Muitas v&atilde;o de &ocirc;nibus, mas tamb&eacute;m h&aacute; os que preferem ir a p&eacute;, como um grupo de romeiros da cidade de Fartura (SP), que anualmente, vai at&eacute; o santu&aacute;rio para assistir a primeira missa do dia e depois retornam para sua cidade.</p>
<p><strong>A festa recebe fieis de todo o Estado e tamb&eacute;m de v&aacute;rias cidades paulistas.</strong></p>
<p>Um dos organizadores, Alex Alves contou que a igreja mant&eacute;m a Pastoral da Acolhida, que faz a recep&ccedil;&atilde;o dos visitantes e at&eacute; os ajuda com lanches, no caso dos que v&atilde;o a p&eacute;. &ldquo;Chegam &ocirc;nibus e vans de todo o Brasil, mas o forte mesmo, al&eacute;m do Paran&aacute;, s&atilde;o os moradores das cidades da regi&atilde;o sul do estado de S&atilde;o Paulo&rdquo;, comentou Alex.</p>
<p>&ldquo;Quando vai chegando o per&iacute;odo da festa, a cidade se transforma. &Eacute; impressionante como a vida dos moradores de Siqueira Campos ganha outro sentido. Parece que todo mundo fica mais sens&iacute;vel, mais solid&aacute;rio e mais alegre&rdquo;, comentou.</p>
<p><strong>Novena</strong></p>
<p>A novena &ldquo;Fazei Tudo o que Ele vos Disser&rdquo;, come&ccedil;a quinta-feira, 27. Haver&aacute; visita peregrina das imagens do Senhor Bom Jesus, da M&atilde;e Aparecida e da Sagrada Fam&iacute;lia aos bairros da cidade. Dia 27, &agrave;s 19 horas, haver&aacute; prociss&atilde;o Luminosa com sa&iacute;da da igreja matriz. Os fieis devem levar velas. Diariamente haver&aacute; missas no Santu&aacute;rio.</p>
<p>No dia 6, haver&aacute; missa &agrave;s 8h30, 10h, 11h40, 13 horas, e &agrave;s 15 horas, prociss&atilde;o.</p>
<p>No dia 12 de agosto, haver&aacute; outra prociss&atilde;o luminosa com a imagem do Senhor Bom Jesus. Ela sair&aacute; do Santu&aacute;rio rumo a matriz.</p>',
                'image' => '/photos//bjcv.JPG',
                'thumb' => '/photos//thumbs/bjcv.JPG',
                'meta_description' => NULL,
                'meta_title' => 'Novena para Bom Jesus da Cana Verde',
                'meta_keywords' => NULL,
                'created_at' => '2017-07-30 20:15:54',
                'updated_at' => '2017-08-03 19:51:26',
                'deleted_at' => '2017-08-03 19:51:26',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'type_id' => 1,
                'active' => 1,
                'title' => '86º Festa do Senhor Bom Jesus da Cana Verde -   Procissão Luminosa  2017',
            'body' => '<p>Na noite de quinta-feira (27) foi realizada na cidade de Siqueira Campos a Prociss&atilde;o Luminosa que deu in&iacute;cio oficialmente a abertura da 86&ordf; festa do Senhor Bom Jesus da Cana Verde, milhares de pessoas estiveram presentes mostrando sua devo&ccedil;&atilde;o ao Senhor Bom Jesus. A prociss&atilde;o iluminada cruzou a cidade, num momento de f&eacute; e emo&ccedil;&atilde;o, chegando ao Santu&aacute;rio em uma linda demonstra&ccedil;&atilde;o de devo&ccedil;&atilde;o, fogos de artif&iacute;cios forma lan&ccedil;ados ao c&eacute;u em uma homenagem lind&iacute;ssima, seguida de uma missa ministrada pelo Frei Marcus.</p>
<p>Deus seja Louvado...<br />Bom Jesus da Cana Verde:."O CORA&Ccedil;&Atilde;O DO NORTE PIONEIRO".</p>',
                'image' => '/photos//20294196_713916412151353_8917223207241905277_n.jpg',
                'thumb' => '/photos//thumbs/20294196_713916412151353_8917223207241905277_n.jpg',
                'meta_description' => NULL,
                'meta_title' => '86º Festa do Senhor Bom Jesus da Cana Verde -   Procissão Luminosa  2017',
                'meta_keywords' => NULL,
                'created_at' => '2017-07-31 11:30:17',
                'updated_at' => '2017-07-31 11:30:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'type_id' => 1,
                'active' => 1,
                'title' => 'Fala Cidade: Entrevista com investigador Fernando',
            'body' => '<p>Recebemos no programa Fala Cidade desta quinta-feira (27) o investigador Fernando Teixeira, falando sobre a seguran&ccedil;a da 86&ordm; Festa do Senhor Bom Jesus da Cana Verde, quais os procedimentos a serem tomados para cuidar das casas e carros, tudo isso para garantir uma festa agrad&aacute;vel a todos.</p>',
                'image' => '/photos//20431177_713626105513717_3456908768747610446_n.jpg',
                'thumb' => '/photos//thumbs/20431177_713626105513717_3456908768747610446_n.jpg',
                'meta_description' => NULL,
                'meta_title' => 'Fala Cidade: Entrevista com investigador Fernando',
                'meta_keywords' => NULL,
                'created_at' => '2017-07-31 11:36:52',
                'updated_at' => '2017-08-10 21:39:19',
                'deleted_at' => '2017-08-10 21:39:19',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'type_id' => 1,
                'active' => 1,
                'title' => 'Professor de Siqueira Campos está entre os 50 finalistas no Prêmio Educador Nota 10',
                'body' => 'Insira um conteudo para sua postagem',
                'image' => '/photos//marcelinocencio_pereira_costa.jpg',
                'thumb' => '/photos//thumbs/marcelinocencio_pereira_costa.jpg',
                'meta_description' => NULL,
                'meta_title' => 'Professor de Siqueira Campos está entre os 50 finalistas no Prêmio Educador Nota 10',
                'meta_keywords' => NULL,
                'created_at' => '2017-08-02 10:47:43',
                'updated_at' => '2017-08-03 21:10:43',
                'deleted_at' => '2017-08-03 21:10:43',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'type_id' => 1,
                'active' => 1,
                'title' => 'Giro Esportivo: Um programa inovador,moderno e interativo!',
                'body' => '<p>Um programa inovador,moderno e interativo!</p>
<div class="text_exposed_show">
<p>Aqui voc&ecirc; acompanha as not&iacute;cias do esporte da nossa regi&atilde;o, sem deixar de lado as not&iacute;cias dos principais clubes do pa&iacute;s.Entrevistas exclusivas, onde o ouvinte tem a oportunidade de interagir com nossa equipe!</p>
<p>Segunda a sexta-feira das 11h &agrave; 12h.</p>
</div>',
                'image' => '/photos//esporte.jpg',
                'thumb' => '/photos//thumbs/esporte.jpg',
                'meta_description' => NULL,
                'meta_title' => 'Giro Esportivo: Um programa inovador,moderno e interativo!',
                'meta_keywords' => NULL,
                'created_at' => '2017-08-03 20:17:55',
                'updated_at' => '2017-08-10 21:39:13',
                'deleted_at' => '2017-08-10 21:39:13',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 2,
                'type_id' => 2,
                'active' => 1,
                'title' => 'Lollapalooza Brasil terá três dias em março de 2018',
                'body' => '<p>Lollapalooza Brasil ter&aacute; tr&ecirc;s dias em mar&ccedil;o de 2018</p>',
                'image' => '/photos//664415375-lollapalooza-brasil-tera-tres-dias-em-marco-de-2018.jpg',
                'thumb' => '/photos//thumbs/664415375-lollapalooza-brasil-tera-tres-dias-em-marco-de-2018.jpg',
                'meta_description' => NULL,
                'meta_title' => 'Lollapalooza Brasil terá três dias em março de 2018',
                'meta_keywords' => NULL,
                'created_at' => '2017-08-03 20:43:28',
                'updated_at' => '2017-08-10 21:38:57',
                'deleted_at' => '2017-08-10 21:38:57',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 2,
                'type_id' => 3,
                'active' => 1,
                'title' => 'Entrevista Dr. Felipe Batistela',
            'body' => '<p><span id="fbPhotoSnowliftCaption" class="fbPhotosPhotoCaption" tabindex="0" aria-live="polite" data-ft="{&quot;tn&quot;:&quot;K&quot;}"><span class="hasCaption">Ficar triste ap&oacute;s o epis&oacute;dio violento &eacute; normal. Quando procurar ajuda?&nbsp;<br /><br />Essa e outras perguntas ser&atilde;o respondidas na entrevista desta quinta-feira (03) com Dr. Felipe Batistela que vem com o tema "Estresse p&oacute;s-traum&aacute;tico".<br /><br />Manh&atilde; Total - Das 8h &agrave;s 10h da manh&atilde;.</span></span></p>
<div id="fbPhotoSnowliftProductsTagList" class="pts fbPhotoProductsTagList">&nbsp;</div>
<div id="fbPhotoSnowliftProductTags" class="fbPhotoProductTags">&nbsp;</div>',
                'image' => '/photos//20597426_716183981924596_3405880154766865473_n.jpg',
                'thumb' => '/photos//thumbs/20597426_716183981924596_3405880154766865473_n.jpg',
                'meta_description' => NULL,
                'meta_title' => 'Entrevista Dr. Felipe Batistela',
                'meta_keywords' => NULL,
                'created_at' => '2017-08-03 21:01:31',
                'updated_at' => '2017-08-03 21:01:31',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 2,
                'type_id' => 3,
                'active' => 1,
                'title' => 'Manhã Total - Entrevista com o Dr. Celso G. de Oliveria',
                'body' => '<p>Conteudo Teste</p>',
                'image' => '/photos//DSCN7849.JPG',
                'thumb' => '/photos//thumbs/DSCN7849.JPG',
                'meta_description' => NULL,
                'meta_title' => 'Manhã Total - Entrevista com o Dr. Celso G. de Oliveria',
                'meta_keywords' => NULL,
                'created_at' => '2017-08-10 21:28:54',
                'updated_at' => '2017-08-11 11:00:19',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 2,
                'type_id' => 2,
                'active' => 1,
                'title' => 'Materia Teste',
                'body' => '<p>Materia Teste</p>',
                'image' => '/photos//17426258_1772349759747651_8064794164004148780_n.jpg',
                'thumb' => '/photos//thumbs/17426258_1772349759747651_8064794164004148780_n.jpg',
                'meta_description' => NULL,
                'meta_title' => 'Materia Teste',
                'meta_keywords' => NULL,
                'created_at' => '2017-08-11 10:47:01',
                'updated_at' => '2017-08-11 10:58:55',
                'deleted_at' => '2017-08-11 10:58:55',
            ),
        ));
        
        
    }
}