
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmyTable extends Migration
{
    /**
     * Run the migrations.
     * @table Firmy
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Firmy', function (Blueprint $table) {
            $table->increments('idFirmy');
            $table->string('Nazov', 45);
            $table->string('Adresa', 60);
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

        Schema::drop('Firmy');
    }
}
