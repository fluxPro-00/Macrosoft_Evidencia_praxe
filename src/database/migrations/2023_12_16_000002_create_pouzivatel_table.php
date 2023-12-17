
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePouzivatelTable extends Migration
{
    /**
     * Run the migrations.
     * @table pouzivatel
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pouzivatel', function (Blueprint $table) {
            $table->increments('idPouzivatel');
            $table->string('Meno', 45);
            $table->string('Priezvisko', 45);
            $table->string('Email', 45);
            $table->string('Heslo', 45);
            $table->string('Tel_cislo', 10);
            $table->integer('Typ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
        Schema::drop('pouzivatel');
     }
}
