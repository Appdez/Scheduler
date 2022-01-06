<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSchedulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_schedulers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('scheduled_at', 6)->nullable();
            $table->timestamp('scheduled_end_at', 6)->nullable();
            $table->timestamp('scheduled_for', 6)->nullable();
            $table->timestamp('scheduled_ended_at', 6)->nullable();
            $table->unsignedBigInteger('client_id')->index('fk_client_schedulers_users1_idx');
            $table->unsignedInteger('service_id')->index('fk_client_schedulers_schedule_services1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_schedulers');
    }
}
