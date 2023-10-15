<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('job')->nullable();
            $table->date('dateNaiss')->nullable();
            $table->string('mail')->nullable();
            $table->string('avatar')->nullable();
            $table->string('mobil01')->nullable();
            $table->string('mobil02')->nullable();
            $table->string('phone')->nullable();
            $table->string('siteWeb')->nullable();
            $table->string('ville')->nullable();
            $table->string('adress')->nullable();
            
            // $table->string('sms')->default(1);
            // $table->string('appel')->default(1);
            // $table->string('telegram')->default(0);
            // $table->string('whatsapp')->default(1);


            $table->integer('etat')->default(1);
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
        Schema::dropIfExists('clients');
    }   
}
