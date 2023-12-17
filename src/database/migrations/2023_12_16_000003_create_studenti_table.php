
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentiTable extends Migration
{
    /**
     * Run the migrations.
     * @table studenti
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studenti', function (Blueprint $table) {
            $table->increments('idStudenti');
            $table->integer('RokStudia');
            $table->string('Stupen', 45);
            $table->string('AkademickyRok', 45);
            $table->string('Osvedcenia', 255)->nullable();
            $table->tinyInteger('SchvalenyVykaz')->nullable();
            $table->unsignedInteger('studijneprogramy_idStudijneProgramy');
            $table->unsignedInteger('pouzivatel_idPouzivatel');
            # Indexes
            $table->index('studijneprogramy_idStudijneProgramy');
            $table->index('pouzivatel_idPouzivatel');
            $table->softDeletes();

            $table->foreign('studijneprogramy_idStudijneProgramy', 'fk_studenti_studijneprogramy1_idx')
                ->references('idStudijneProgramy')->on('studijneprogramy')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pouzivatel_idPouzivatel', 'fk_studenti_pouzivatel1_idx')
                ->references('idPouzivatel')->on('pouzivatel')
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
        Schema::drop('studenti');

     }
}
