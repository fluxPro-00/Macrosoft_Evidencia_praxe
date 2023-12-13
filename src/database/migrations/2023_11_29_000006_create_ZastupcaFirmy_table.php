
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZastupcafirmyTable extends Migration
{
    /**
     * Run the migrations.
     * @table ZastupcaFirmy
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ZastupcaFirmy', function (Blueprint $table) {
            $table->increments('idZastupcaFirmy');
            $table->string('Meno', 45);
            $table->string('Priezvisko', 45);
            $table->string('Email', 45);
            $table->string('Heslo', 45);
            $table->string('Tel_cislo', 45);
            $table->unsignedInteger('Firmy_idFirmy');
            $table->unsignedInteger('Pouzivatel_idPouzivatel');
            # Indexes
            $table->index('Firmy_idFirmy');
            $table->index('Pouzivatel_idPouzivatel');


            $table->foreign('Firmy_idFirmy', 'fk_ZastupcaFirmy_Firmy1_idx')
                ->references('idFirmy')->on('Firmy')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Pouzivatel_idPouzivatel', 'fk_ZastupcaFirmy_Pouzivatel1_idx')
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

        Schema::drop('ZastupcaFirmy');
    }
}
