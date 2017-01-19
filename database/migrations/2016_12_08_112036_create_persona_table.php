<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('cedula');
            $table->double('nota1');
            $table->double('nota2');
            $table->double('promedio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('persona');
    }

}
