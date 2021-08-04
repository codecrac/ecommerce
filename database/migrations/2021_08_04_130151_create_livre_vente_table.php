<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivreVenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livre_vente', function (Blueprint $table) {
            $table->id();
            $table->integer('id_stat_achat');
            $table->integer('id_commande');
            $table->integer('id_article');
            $table->string('image');
            $table->string('titre');
            $table->integer('prix');
            $table->integer('qte');
            $table->integer('prix_total');
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
        Schema::dropIfExists('livre_vente');
    }
}
