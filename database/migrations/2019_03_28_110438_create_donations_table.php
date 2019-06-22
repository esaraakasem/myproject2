<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationsTable extends Migration {

	public function up()
	{
		Schema::create('donations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('hospitalname', 50);
			$table->timestamps();
			$table->string('name', 50);
			$table->string('age', 50);
			$table->string('blood', 50);
			$table->string('addresshospital', 50);
			$table->integer('phone');
			$table->integer('city_id');
			$table->string('notices', 55);
			$table->integer('client_id');
			$table->double('latitude', 8,8);
			$table->double('longitude', 8,8);
		});
	}

	public function down()
	{
		Schema::drop('donations');
	}
}