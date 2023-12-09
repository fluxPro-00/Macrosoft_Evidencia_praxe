
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraxeTable extends Migration
{
    /**
     * Run the migrations.
     * @table Praxe
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Praxe', function (Blueprint $table) {
            $table->increments('idPraxe');
            $table->unsignedInteger('Firmy_idFirmy');
            $table->unsignedInteger('Studijneprogramy_idStudijneProgramy');
            $table->string('Pozícia', 45);
            $table->dateTime('Začiatok');
            $table->dateTime('Koniec');
            $table->string('Stav', 30);
            $table->string('Hodnotenie', 5);
            # Indexes
            $table->index('Firmy_idFirmy');


            $table->foreign('Firmy_idFirmy', 'fk_Praxe_Firmy1_idx')
                ->references('idFirmy')->on('Firmy')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('StudijneProgramy_idStudijneProgramy', 'fk_Praxe_StudijneProgramy1_idx')
                ->references('idStudijneProgramy')->on('StudijneProgramy')
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

        Schema::drop('Praxe');
    }
}
