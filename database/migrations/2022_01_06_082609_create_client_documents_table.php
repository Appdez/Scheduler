<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_documents', function (Blueprint $table) {
            $table->unsignedInteger('document_id')->index('fk_documents_has_client_schedulers_documents1_idx');
            $table->unsignedInteger('client_schedule_id')->index('fk_documents_has_client_schedulers_client_schedulers1_idx');
            $table->string('value')->nullable();

            $table->primary(['document_id', 'client_schedule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_documents');
    }
}
