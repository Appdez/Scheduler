<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvgQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avg_queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('minutes')->nullable();
            $table->unsignedInteger('service_id')->index('fk_avg_queues_schedule_services1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avg_queues');
    }
}
