<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClientSchedulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_schedulers', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_client_schedulers_schedule_services1')->references(['id'])->on('schedule_services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['client_id'], 'fk_client_schedulers_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_schedulers', function (Blueprint $table) {
            $table->dropForeign('fk_client_schedulers_schedule_services1');
            $table->dropForeign('fk_client_schedulers_users1');
        });
    }
}
