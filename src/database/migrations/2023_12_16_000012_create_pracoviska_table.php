
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracoviskaTable extends Migration
{
    /**
     * Run the migrations.
     * @table pracoviska
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pracoviska', function (Blueprint $table) {
            $table->increments('idPracoviska');
            $table->string('Nazov', 45);
            $table->string('Adresa', 45);
            $table->unsignedInteger('administratori_idAdministratori');
	        $table->unsignedInteger('veduci_idVeduci');
            # Indexes
            $table->index('administratori_idAdministratori');
            $table->index('veduci_idVeduci');
            $table->softDeletes();

            $table->foreign('administratori_idAdministratori', 'fk_pracoviska_administratori1_idx')
                ->references('idAdministratori')->on('administratori')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('veduci_idVeduci', 'fk_pracoviska_veduci1_idx')
                ->references('idVeduci')->on('veduci')
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
        Schema::drop('pracoviska');
     }
}
