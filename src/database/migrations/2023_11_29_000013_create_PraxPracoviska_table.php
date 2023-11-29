
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraxpracoviskaTable extends Migration
{
    /**
     * Run the migrations.
     * @table PraxPracoviska
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PraxPracoviska', function (Blueprint $table) {
            $table->unsignedInteger('Praxe_idPraxe');
            $table->unsignedInteger('Pracoviska_idPracoviska');
            # Indexes
            $table->index('Pracoviska_idPracoviska');
            $table->index('Praxe_idPraxe');


            $table->foreign('Praxe_idPraxe', 'fk_Praxe_has_Pracoviska_Praxe1_idx')
                ->references('idPraxe')->on('Praxe')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Pracoviska_idPracoviska', 'fk_Praxe_has_Pracoviska_Pracoviska1_idx')
                ->references('idPracoviska')->on('Pracoviska')
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

        Schema::drop('PraxPracoviska');
    }
}
