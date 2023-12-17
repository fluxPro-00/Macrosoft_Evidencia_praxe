
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivovaneTable extends Migration
{
    /**
     * Run the migrations.
     * @table archivovane
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivovane', function (Blueprint $table) {
            $table->increments('idArchivovane');
            $table->date('Datum');
            $table->unsignedInteger('praxe_idPraxe');
            # Indexes
            $table->index('praxe_idPraxe');

            $table->foreign('praxe_idPraxe', 'fk_archivovane_praxe1_idx')
                ->references('idPraxe')->on('praxe')
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
        Schema::drop('archivovane');
     }
}
