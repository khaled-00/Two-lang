<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function (Blueprint $table) 
		{
		    $table->increments('id');
		    $table->integer('article_id')->unsigned();
		    $table->text('image');
		    $table->timestamps();

		    $table->foreign('article_id')->references('id')->on('articles');
		});

		Schema::create('post_translations', function (Blueprint $table) 
		{
		    $table->increments('id');
		    $table->integer('post_id')->unsigned();
		    $table->string('locale')->index();

		    $table->string('title');
		    $table->text('description');
		    $table->timestamps();

		    $table->unique(['post_id','locale']);
		    $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
		Schema::drop('post_translations');
	}

}
