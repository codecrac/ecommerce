<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosgeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infosgenerales', function (Blueprint $table) {
            $table->id();
            $table->string('organisation');
            $table->longText('logo');
            $table->longText('banniere');
            $table->string('adresse');
            $table->string('telephones');
            $table->string('email');
            $table->string('apropos');
            $table->longText('apropos_complet');
            $table->string('lien_fb')->nullable();
            $table->string('lien_twitter')->nullable();
            $table->string('lien_insta')->nullable();
            $table->string('lien_linkedin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infosgenerales');
    }
}
