<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Palestra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istruttori', function (Blueprint $table) {
            $table->id('id_istr');
            $table->string('nome_istr');
            $table->string('cognome');
            $table->date('nascita');
            $table->char('cf','16');
            $table->string('contratto');
            $table->string('infocontatto'); //e-mail
            $table->timestamps();
        });

        Schema::create('corsi', function (Blueprint $table) {
            $table->id('id_cors');
            $table->string('nome');
            $table->string('descrizione','60');
            $table->string('tipo'); //es. pilates, yoga
            $table->integer('durata');
            $table->string('image')->nullable();
            $table->integer('nmax');
            $table->integer('niscr');
            $table->integer('prezzo');
            $table->unsignedBigInteger('istruttore');
            $table->foreign('istruttore')->references('id_istr')->on('istruttori');
            $table->timestamps();
        });

        Schema::create('abbonamenti', function (Blueprint $table) {
            $table->id('id_abbo');
            $table->unsignedBigInteger('id_utente');
            $table->foreign('id_utente')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('carrello', function (Blueprint $table) {
            $table->id('id_cart');
            $table->unsignedBigInteger('id_corso');
            $table->foreign('id_corso')->references('id_cors')->on('corsi');
            $table->unsignedBigInteger('id_utente');
            $table->foreign('id_utente')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('acquisti', function (Blueprint $table) {
            $table->id('id_acqu');
            $table->unsignedBigInteger('id_corsi');
            $table->date('scade');
            $table->foreign('id_corsi')->references('id_cors')->on('corsi');
            $table->unsignedBigInteger('id_utente');
            $table->foreign('id_utente')->references('id')->on('users');
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
        Schema::dropIfExists('corsi');
        Schema::dropIfExists('abbonamenti');
        Schema::dropIfExists('istruttori');
        Schema::dropIfExists('carrello');
        Schema::dropIfExists('acquisti');
    }
}
