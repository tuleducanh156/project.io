<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_blogs');
            $table->unsignedInteger('id_member');
            $table->string('name_member');
            $table->string('avatar_member');
            $table->string('message');
            $table->unsignedInteger('level')->default(0)->comment = '0:cmtCha 1:cmtCon';
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
        Schema::dropIfExists('comment_blogs');
    }
}
