
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentiHasPraxeTable extends Migration
{
    /**
     * Run the migrations.
     * @table studenti_has_praxe
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studenti_has_praxe', function (Blueprint $table) {
            $table->unsignedInteger('studenti_idStudenti');
            $table->unsignedInteger('praxe_idPraxe');
            # Indexes
            $table->index('praxe_idPraxe');
            $table->index('studenti_idStudenti');

            $table->foreign('studenti_idStudenti', 'fk_studenti_has_praxe_studenti1_idx')
                ->references('idStudenti')->on('studenti')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('praxe_idPraxe', 'fk_studenti_has_praxe_praxe1_idx')
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
        Schema::drop('studenti_has_praxe');
     }
}
