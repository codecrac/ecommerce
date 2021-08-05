<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->integer('id_parent')->nullable();
            $table->integer('reduction')->default(0);
            $table->enum('etat_promotion',['false','true']);
            $table->enum('type',['parent','menu_simple']);  // pour le rangement dans le menu
            $table->string('titre');
            $table->string('icone')->nullable();
            $table->string('image_illustration')->nullable();
            $table->boolean('present_sur_accueil')->default(true);
            $table->enum('mis_en_evidence',['non','1','2','3','4'])->default('non');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
