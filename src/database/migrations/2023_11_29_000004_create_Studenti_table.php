
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentiTable extends Migration
{
    /**
     * Run the migrations.
     * @table Studenti
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Studenti', function (Blueprint $table) {
            $table->increments('idStudenti');
            $table->string('Meno', 45);
            $table->string('Priezvisko', 45);
            $table->string('Tel_cislo', 15);
            $table->unsignedInteger('StudijneProgramy_idStudijneProgramy');
            $table->unsignedInteger('Pouzivatel_idPouzivatel');
            # Indexes
            $table->index('StudijneProgramy_idStudijneProgramy');
            $table->index('Pouzivatel_idPouzivatel');


            $table->foreign('StudijneProgramy_idStudijneProgramy', 'fk_Studenti_StudijneProgramy1_idx')
                ->references('idStudijneProgramy')->on('StudijneProgramy')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Pouzivatel_idPouzivatel', 'fk_Studenti_Pouzivatel1_idx')
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

        Schema::drop('Studenti');
    }
}
