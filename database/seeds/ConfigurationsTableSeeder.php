<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confs = [
            'suffix' => 'Radio Bom Jesus',
            'footer_text' => '.:: Radio Bom Jesus ::.',
            'player_url' => 'http://servidor26.brlogic.com:8142/live',
            'social_instagram' => 'https://www.instagram.com/?hl=pt-br',
            'social_twitter' => 'https://twitter.com',
            'social_youtube' => 'https://www.youtube.com/',
            'social_facebook' => 'https://www.facebook.com/radiobomjesus/',
            'social_android' => 'https://play.google.com/store/apps/details?id=net.minhawebradio.radiobomjesus',
            'banner_url' => 'https://giroesportivorbj.wixsite.com/radiogiroesportivo',
            'banner_src' => '/photos/programas/giro_esportivo.jpg'
        ];

        foreach($confs as $key => $value) {
            Configuration::set($key, $value);
        }
    }
}
