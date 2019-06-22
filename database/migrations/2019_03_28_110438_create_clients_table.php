<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('phone');
			$table->string('password');
			$table->string('username');
			$table->integer('age');
			$table->string('blood');
			$table->string('number');
			$table->string('name_hospital');
			$table->string('addres');
			$table->integer('city_id');
			$table->string('notices');
			$table->string('api_token')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}