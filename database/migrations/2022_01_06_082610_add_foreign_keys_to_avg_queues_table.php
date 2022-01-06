<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAvgQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('avg_queues', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_avg_queues_schedule_services1')->references(['id'])->on('schedule_services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avg_queues', function (Blueprint $table) {
            $table->dropForeign('fk_avg_queues_schedule_services1');
        });
    }
}
