
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoverenizamestnanciTable extends Migration
{
    /**
     * Run the migrations.
     * @table PovereniZamestnanci
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PovereniZamestnanci', function (Blueprint $table) {
            $table->increments('idPovereni');
            $table->string('Meno', 20);
            $table->string('Priezvisko', 20);
            $table->string('Email', 45);
            $table->string('Heslo', 45);
            $table->string('Tel_cislo', 45);
            $table->unsignedInteger('Pracoviska_idPracoviska');
            $table->unsignedInteger('Pouzivatel_idPouzivatel');
            # Indexes
            $table->index('Pracoviska_idPracoviska');
            $table->index('Pouzivatel_idPouzivatel');


            $table->foreign('Pracoviska_idPracoviska', 'fk_PovereniZamestnanci_Pracoviska1_idx')
                ->references('idPracoviska')->on('Pracoviska')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Pouzivatel_idPouzivatel', 'fk_PovereniZamestnanci_Pouzivatel1_idx')
                ->references('idPouzivatel')->on('Pouzivatel')
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

        Schema::drop('PovereniZamestnanci');
    }
}
