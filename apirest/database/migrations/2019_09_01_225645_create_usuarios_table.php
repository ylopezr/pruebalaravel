<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{   $table->engine = "InnoDB";
			$table->increments('idusuarios', true);
			$table->string('nombres', 45);
			$table->string('apellidos', 45);
			$table->string('cedula',45)->unique();
            $table->string('correo',45)->unique();
			$table->string('telefono', 45);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
