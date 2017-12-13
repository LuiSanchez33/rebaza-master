<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lawyers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('image')->nullable();

            $table->string('download_cv_es')->nullable();
            $table->string('download_cv_en')->nullable();

            $table->string('download_txt_es')->default('Descargar');
			$table->string('download_txt_en')->default('Download');

			$table->string('job_es');
			$table->string('job_en');

			// 1 => socios, 2 => Asociados, 3 => Consultores
			$table->tinyInteger('type');

            $table->text('list_es');
            $table->text('list_en');

            $table->mediumText('info_es');
            $table->mediumText('info_en');

            $table->text('text_es');
            $table->text('text_en');

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
		Schema::drop('lawyers');
	}

}
