
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraxeTable extends Migration
{
    /**
     * Run the migrations.
     * @table praxe
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praxe', function (Blueprint $table) {
            $table->increments('idPraxe');
            $table->string('Pozicia', 45);
            $table->date('Zaciatok');
            $table->date('Koniec')->nullable();
            $table->string('Stav', 45);
            $table->string('Hodnotenie', 125);
            $table->string('TypZmluvy', 45);
	    $table->unsignedInteger('firmy_idFirmy');
            $table->unsignedInteger('studijneprogramy_idStudijneProgramy');
            # Indexes
            $table->index('firmy_idFirmy');
            $table->index('studijneprogramy_idStudijneProgramy');
            $table->softDeletes();

            $table->foreign('firmy_idFirmy', 'fk_praxe_firmy1_idx')
                ->references('idFirmy')->on('firmy')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('studijneprogramy_idStudijneProgramy', 'fk_praxe_studijneprogramy1_idx')
                ->references('idStudijneProgramy')->on('studijneprogramy')
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
        Schema::drop('praxe');
     }
}
