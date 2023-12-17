
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportadminTable extends Migration
{
    /**
     * Run the migrations.
     * @table reportadmin
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportadmin', function (Blueprint $table) {
            $table->increments('idreportadmin');
            $table->string('Obsah', 255);
	    $table->unsignedInteger('administratori_idAdministratori');
            # Indexes
            $table->index('administratori_idAdministratori');

            $table->foreign('administratori_idAdministratori', 'fk_reportadmin_administratori1_idx')
                ->references('idAdministratori')->on('administratori')
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
        Schema::drop('reportadmin');
     }
}
