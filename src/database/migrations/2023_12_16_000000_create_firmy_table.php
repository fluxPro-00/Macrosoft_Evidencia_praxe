
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmyTable extends Migration
{
    /**
     * Run the migrations.
     * @table firmy
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firmy', function (Blueprint $table) {
            $table->increments('idFirmy');
            $table->string('Nazov', 45);
            $table->string('Adresa', 45);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
        Schema::drop('firmy');
     }
}
