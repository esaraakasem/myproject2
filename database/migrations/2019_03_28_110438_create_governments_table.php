<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentsTable extends Migration {

	public function up()
	{
		Schema::create('governments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('government_name', 50);
		});
	}

	public function down()
	{
		Schema::drop('governments');
	}
}