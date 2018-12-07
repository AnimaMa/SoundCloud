

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->default(1);
            $table->string('name');
            $table->string('producer')->default('undefined');
            $table->string('genres')->default('undefined');
            $table->string('type')->default('undefined');
            $table->integer('amount_songs');
            $table->integer('released');
            $table->string('cover')->default( 'uploads/covers/cat.jpg');
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
        Schema::dropIfExists('albums');
    }
}
