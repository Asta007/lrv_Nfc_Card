<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
           $table->integer('appel')->default(1);
           $table->integer('sms')->default(1);
           $table->integer('telegram')->default(1);
           $table->integer('whatsapp')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('appel');
            $table->dropColumn('sms');
            $table->dropColumn('telegram');
            $table->dropColumn('whatsapp');
        });
    }
}
