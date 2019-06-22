<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingTable extends Migration {

	public function up()
	{
		Schema::create('setting', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('facebook');
			$table->string('twitter');
			$table->string('youtube');
			$table->string('instgram');
			$table->string('whatsapp');
			$table->string('google');
			$table->text('about_me');
			$table->integer('phone');
			$table->string('email');
		});
	}

	public function down()
	{
		Schema::drop('setting');
	}
}