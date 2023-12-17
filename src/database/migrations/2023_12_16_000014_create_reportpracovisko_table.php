
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportpracoviskoTable extends Migration
{
    /**
     * Run the migrations.
     * @table reportpracovisko
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportpracovisko', function (Blueprint $table) {
            $table->increments('idreportpracovisko');
            $table->string('Obsah', 255)->nullable();
	    $table->unsignedInteger('pracoviska_idPracoviska');
            $table->unsignedInteger('veduci_idVeduci1');
            # Indexes
            $table->index('pracoviska_idPracoviska');
            $table->index('veduci_idVeduci1');

            $table->foreign('pracoviska_idPracoviska', 'fk_reportpracovisko_pracoviska1_idx')
                ->references('idPracoviska')->on('pracoviska')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('veduci_idVeduci1', 'fk_reportpracovisko_veduci2_idx')
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
        Schema::drop('reportpracovisko');
     }
}
