
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratoriTable extends Migration
{
    /**
     * Run the migrations.
     * @table administratori
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administratori', function (Blueprint $table) {
            $table->increments('idAdministratori');
            $table->unsignedInteger('pouzivatel_idPouzivatel');
            # Indexes
            $table->index('pouzivatel_idPouzivatel');

            $table->foreign('pouzivatel_idPouzivatel', 'fk_administratori_pouzivatel1_idx')
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
        Schema::drop('administratori');
     }
}
