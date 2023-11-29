
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudijneprogramyTable extends Migration
{
    /**
     * Run the migrations.
     * @table StudijneProgramy
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StudijneProgramy', function (Blueprint $table) {
            $table->increments('idStudijneProgramy');
            $table->string('Nazov', 45);
            $table->string('Skratka', 15);
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

        Schema::drop('StudijneProgramy');
    }
}
