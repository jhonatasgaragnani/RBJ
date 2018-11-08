<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function(Blueprint $table) {
            $table->increments('id');
            $table->string('speaker');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('thumb');
            $table->timestamps();
        });
        Schema::create('day_schedule', function(Blueprint $table) {
            $table->integer('schedule_id')->unsigned();
            $table->integer('day_id')->unsigned();
            $table->string('starts_at');
            $table->string('ends_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('day_schedule');
    }
}
