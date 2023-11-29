
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracoviskaTable extends Migration
{
    /**
     * Run the migrations.
     * @table Pracoviska
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pracoviska', function (Blueprint $table) {
            $table->increments('idPracoviska');
            $table->string('Nazov', 45);
            $table->string('Adresa', 45);
            $table->unsignedInteger('Veduci_idVeduci');
            # Indexes
            $table->index('Veduci_idVeduci');


            $table->foreign('Veduci_idVeduci', 'fk_Pracoviska_Veduci1_idx')
                ->references('idVeduci')->on('Veduci')
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

        Schema::drop('Pracoviska');
    }
}
