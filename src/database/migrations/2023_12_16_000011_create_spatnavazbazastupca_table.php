
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpatnavazbazastupcaTable extends Migration
{
    /**
     * Run the migrations.
     * @table spatnavazbazastupca
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spatnavazbazastupca', function (Blueprint $table) {
            $table->increments('idspatnavazbazastupca');
            $table->string('Obsah', 255);
            $table->unsignedInteger('zastupcafirmy_idZastupcaFirmy');
            $table->unsignedInteger('veduci_idVeduci');
            $table->unsignedInteger('praxe_idPraxe');
            # Indexes
            $table->index('zastupcafirmy_idZastupcaFirmy');
            $table->index('veduci_idVeduci');
            $table->index('praxe_idPraxe');

            $table->foreign('zastupcafirmy_idZastupcaFirmy', 'fk_spatnavazba_zastupcafirmy1_idx')
                ->references('idZastupcaFirmy')->on('zastupcafirmy')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('veduci_idVeduci', 'fk_spatnavazbazastupca_veduci1_idx')
                ->references('idVeduci')->on('veduci')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('praxe_idPraxe', 'fk_spatnavazbazastupca_praxe1_idx')
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
        Schema::drop('spatnavazbazastupca');
     }
}
