
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratoripracoviskaTable extends Migration
{
    /**
     * Run the migrations.
     * @table AdministratoriPracoviska
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AdministratoriPracoviska', function (Blueprint $table) {
            $table->unsignedInteger('Pracoviska_idPracoviska');
            $table->unsignedInteger('Administratori_idAdministratori');
            # Indexes
            $table->index('Administratori_idAdministratori');
            $table->index('Pracoviska_idPracoviska');


            $table->foreign('Pracoviska_idPracoviska', 'fk_Pracoviska_has_Administratori_Pracoviska1_idx')
                ->references('idPracoviska')->on('Pracoviska')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Administratori_idAdministratori', 'fk_Pracoviska_has_Administratori_Administratori1_idx')
                ->references('idAdministratori')->on('Administratori')
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

        Schema::drop('AdministratoriPracoviska');
    }
}
