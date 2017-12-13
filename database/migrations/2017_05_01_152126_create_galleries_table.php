<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image');
			$table->string('name');
//			$table->string('name_en');

			$table->string('data');
//			$table->string('data_en');
			$table->timestamps();

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
		Schema::drop('galleries');
	}

}
