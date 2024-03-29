<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('post_name');
			$table->mediumText('contains');
			$table->string('image');
			$table->integer('category_id');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}