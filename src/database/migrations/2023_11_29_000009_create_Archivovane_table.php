
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivovaneTable extends Migration
{
    /**
     * Run the migrations.
     * @table Archivovane
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Archivovane', function (Blueprint $table) {
            $table->increments('idArchivovane');
            $table->dateTime('Datum');
            $table->unsignedInteger('Praxe_idPraxe');
            # Indexes
            $table->index('Praxe_idPraxe');


            $table->foreign('Praxe_idPraxe', 'fk_Archivovane_Praxe1_idx')
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

        Schema::drop('Archivovane');
    }
}
