<?php

use App\Anotaciones;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB;

class CreateAnotacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anotaciones', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('Clientes')->onDelete('cascade');

            $table->string('Descripcion');
            $table->timestamp('created_at')->default(Anotaciones::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anotaciones');
    }
}
