<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_writer');
            $table->unsignedBigInteger('id_blog_owner');
            $table->text('body');
            $table->timestamp('posted_at');
            
            $table->foreign('id_writer')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_blog_owner')->references('id_owner')->on('blogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
