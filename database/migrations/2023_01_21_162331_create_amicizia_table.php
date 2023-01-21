<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmiciziaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amicizia', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user1');
            $table->unsignedBigInteger('id_user2');
            $table->timestamp('added_at');
            $table->softDeletes(); //se viene rimossa l'amicizia, rimane comunque salvato nel db
            
            $table->foreign('id_user1')->references('id')->on('users');
            $table->foreign('id_user2')->references('id')->on('users');
            
            $table->primary(['id_user1','id_user2']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amicizia');
    }
}
