
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeduciTable extends Migration
{
    /**
     * Run the migrations.
     * @table Veduci
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Veduci', function (Blueprint $table) {
            $table->increments('idVeduci');
            $table->string('Meno', 45);
            $table->string('Priezvisko', 45);
            $table->string('Email', 45);
            $table->string('Heslo', 45);
            $table->string('Tel_cislo', 45);
            $table->unsignedInteger('Pouzivatel_idPouzivatel');
            # Indexes
            $table->index('Pouzivatel_idPouzivatel');


            $table->foreign('Pouzivatel_idPouzivatel', 'fk_Veduci_Pouzivatel1_idx')
                ->references('idPouzivatel')->on('Pouzivatel')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('Veduci');
    }
}
