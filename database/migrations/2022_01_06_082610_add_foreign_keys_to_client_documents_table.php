<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClientDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_documents', function (Blueprint $table) {
            $table->foreign(['client_schedule_id'], 'fk_documents_has_client_schedulers_client_schedulers1')->references(['id'])->on('client_schedulers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['document_id'], 'fk_documents_has_client_schedulers_documents1')->references(['id'])->on('documents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_documents', function (Blueprint $table) {
            $table->dropForeign('fk_documents_has_client_schedulers_client_schedulers1');
            $table->dropForeign('fk_documents_has_client_schedulers_documents1');
        });
    }
}
