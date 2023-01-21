<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sender');
            $table->unsignedBigInteger('id_sent_to');
            $table->text('body');
            $table->set('type', ['normal','request','removed','notice'])->default('normal');
            $table->timestamp('writed_at');
            
            $table->softDeletes();
            
            $table->foreign('id_sender')->references('id')->on('users');
            $table->foreign('id_sent_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
