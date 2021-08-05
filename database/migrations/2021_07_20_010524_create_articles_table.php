<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_menu'); //pour trier les pages
            $table->string('titre');
            $table->longText('image');
            $table->string('extrait');
            $table->longText('contenu');
            $table->integer('prix');
            $table->integer('prix_promo')->nullable()->default(0);
            $table->string('slug')->unique()->nullable();
            $table->integer('nb_achat')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
