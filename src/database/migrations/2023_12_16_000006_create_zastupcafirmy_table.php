
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZastupcafirmyTable extends Migration
{
    /**
     * Run the migrations.
     * @table zastupcafirmy
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zastupcafirmy', function (Blueprint $table) {
            $table->increments('idZastupcaFirmy');
            $table->unsignedInteger('firmy_idFirmy');
            $table->unsignedInteger('pouzivatel_idPouzivatel');
            # Indexes
            $table->index('firmy_idFirmy');
            $table->index('pouzivatel_idPouzivatel');
            $table->softDeletes();

            $table->foreign('firmy_idFirmy', 'fk_zastupcafirmy_firmy1_idx')
                ->references('idFirmy')->on('firmy')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pouzivatel_idPouzivatel', 'fk_zastupcafirmy_pouzivatel1_idx')
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
        Schema::drop('zastupcafirmy');
     }
}
