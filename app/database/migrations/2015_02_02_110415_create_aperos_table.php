<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAperosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aperos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->text('abstract');
			$table->text('content');
			$table->string('url_thumbnail');
			$table->dateTime('date');
			$table->enum('status',array('published','unpublished','trash'))->default('unpublished');
			$table->integer('tag_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('CASCADE');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table->dropForeign('aperos_user_id_foreign');
		$table->dropForeign('aperos_tag_id_foreign');
		Schema::drop('aperos');
	}

}
