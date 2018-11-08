<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(TopsTableSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PollsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(PollOptionsTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(DayScheduleTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
    }
}
