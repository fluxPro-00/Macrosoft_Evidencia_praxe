
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeduciTable extends Migration
{
    /**
     * Run the migrations.
     * @table veduci
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veduci', function (Blueprint $table) {
            $table->increments('idVeduci');
            $table->unsignedInteger('pouzivatel_idPouzivatel');
            # Indexes
            $table->index('pouzivatel_idPouzivatel');
            $table->softDeletes();

            $table->foreign('pouzivatel_idPouzivatel', 'fk_veduci_pouzivatel1_idx')
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
        Schema::drop('veduci');
     }
}
