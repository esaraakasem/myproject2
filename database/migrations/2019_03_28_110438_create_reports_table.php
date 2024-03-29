<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration {

	public function up()
	{
		Schema::create('reports', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('contain', 50);
			$table->integer('client_id');
		});
	}

	public function down()
	{
		Schema::drop('reports');
	}
}