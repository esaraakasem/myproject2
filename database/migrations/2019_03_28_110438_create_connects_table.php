<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConnectsTable extends Migration {

	public function up()
	{
		Schema::create('connects', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('address');
			$table->mediumText('text');
		});
	}

	public function down()
	{
		Schema::drop('connects');
	}
}