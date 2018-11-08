<?php

use Illuminate\Database\Seeder;

class DayScheduleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('day_schedule')->delete();
        
        \DB::table('day_schedule')->insert(array (
            0 => 
            array (
                'schedule_id' => '1',
                'day_id' => '2',
                'starts_at' => '05:00',
                'ends_at' => '07:00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'schedule_id' => '5',
                'day_id' => '2',
                'starts_at' => '07:00',
                'ends_at' => '08:00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'schedule_id' => '6',
                'day_id' => '2',
                'starts_at' => '08:00',
                'ends_at' => '10:00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'schedule_id' => '7',
                'day_id' => '2',
                'starts_at' => '10:00',
                'ends_at' => '11:00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'schedule_id' => '8',
                'day_id' => '2',
                'starts_at' => '11:00',
                'ends_at' => '12:00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}