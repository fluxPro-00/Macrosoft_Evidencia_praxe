
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoverenizamestnanciTable extends Migration
{
    /**
     * Run the migrations.
     * @table poverenizamestnanci
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poverenizamestnanci', function (Blueprint $table) {
            $table->increments('idPovereni');
            $table->unsignedInteger('pracoviska_idPracoviska');
            $table->unsignedInteger('pouzivatel_idPouzivatel');
            # Indexes
            $table->index('pracoviska_idPracoviska');
            $table->index('pouzivatel_idPouzivatel');

            $table->foreign('pracoviska_idPracoviska', 'fk_poverenizamestnanci_pracoviska1_idx')
                ->references('idPracoviska')->on('pracoviska')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pouzivatel_idPouzivatel', 'fk_poverenizamestnanci_pouzivatel1_idx')
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
        Schema::drop('poverenizamestnanci');
     }
}
