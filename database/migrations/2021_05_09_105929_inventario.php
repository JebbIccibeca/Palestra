<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->date('data_uscita');
            $table->string('image')->nullable();
            $table->string('protagonista');
            $table->string('regista');
            $table->integer('etamin');
            $table->integer('stock');
            $table->integer('prezzo');
            $table->timestamps();
        });

        Schema::create('carrello', function (Blueprint $table) {
            $table->id('id_cart');
            $table->unsignedBigInteger('id_prodotto');
            $table->foreign('id_prodotto')->references('id')->on('inventario');
            $table->unsignedBigInteger('id_utente');
            $table->foreign('id_utente')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('acquisto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prodotto');
            $table->foreign('id_prodotto')->references('id')->on('inventario');
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
        Schema::dropIfExists('inventario');
        Schema::dropIfExists('carrello');
        Schema::dropIfExists('acquisto');
    }
}
