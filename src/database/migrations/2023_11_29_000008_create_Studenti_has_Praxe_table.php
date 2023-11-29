
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentiHasPraxeTable extends Migration
{
    /**
     * Run the migrations.
     * @table Studenti_has_Praxe
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Studenti_has_Praxe', function (Blueprint $table) {
            $table->unsignedInteger('Studenti_idStudenti');
            $table->unsignedInteger('Praxe_idPraxe');
            # Indexes
            $table->index('Praxe_idPraxe');
            $table->index('Studenti_idStudenti');


            $table->foreign('Studenti_idStudenti', 'fk_Studenti_has_Praxe_Studenti1_idx')
                ->references('idStudenti')->on('Studenti')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Praxe_idPraxe', 'fk_Studenti_has_Praxe_Praxe1_idx')
                ->references('idPraxe')->on('Praxe')
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

        Schema::drop('Studenti_has_Praxe');
    }
}
