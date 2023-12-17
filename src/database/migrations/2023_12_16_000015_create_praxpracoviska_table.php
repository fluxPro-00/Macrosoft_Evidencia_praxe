
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraxpracoviskaTable extends Migration
{
    /**
     * Run the migrations.
     * @table praxpracoviska
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praxpracoviska', function (Blueprint $table) {
            $table->unsignedInteger('praxe_idPraxe');
            $table->unsignedInteger('pracoviska_idPracoviska');
            # Indexes
            $table->index('pracoviska_idPracoviska');
            $table->index('praxe_idPraxe');
            $table->softDeletes();

            $table->foreign('pracoviska_idPracoviska', 'fk_praxe_has_pracoviska_pracoviska1_idx')
                ->references('idPracoviska')->on('pracoviska')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('praxe_idPraxe', 'fk_praxe_has_pracoviska_praxe1_idx')
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
        Schema::drop('praxpracoviska');
     }
}
