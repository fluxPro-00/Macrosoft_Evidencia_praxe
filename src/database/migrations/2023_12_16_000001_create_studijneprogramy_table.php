
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudijneprogramyTable extends Migration
{
    /**
     * Run the migrations.
     * @table studijneprogramy
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studijneprogramy', function (Blueprint $table) {
            $table->increments('idStudijneProgramy');
            $table->string('Nazov', 45);
            $table->string('Skratka', 45);
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
        Schema::drop('studijneprogramy');
     }
}
