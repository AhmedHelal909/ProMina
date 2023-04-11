<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('pictures', function(Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade')->onUpdate('cascade');

		});

       


	}

	public function down()
	{
		Schema::table('pictures', function(Blueprint $table) {
			$table->dropForeign('albums_id_foreign');
		});
      
	}
}