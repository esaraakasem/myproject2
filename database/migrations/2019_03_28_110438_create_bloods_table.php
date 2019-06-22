<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloodsTable extends Migration {

	public function up()
	{
		Schema::create('bloods', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nameblood', 50);
		});
	}

	public function down()
	{
		Schema::drop('bloods');
	}
}