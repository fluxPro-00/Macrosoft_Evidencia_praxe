
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePouzivatelTable extends Migration
{
    /**
     * Run the migrations.
     * @table Pouzivatel
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pouzivatel', function (Blueprint $table) {
            $table->increments('idPouzivatel');
            $table->integer('Typ');
            # Indexes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('Pouzivatel');
    }
}
