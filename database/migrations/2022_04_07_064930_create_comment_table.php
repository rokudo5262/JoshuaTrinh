<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration {
    public function up() {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_id')->unsigned()->index()->comment('comment belong to post');
            $table->bigInteger('user_id')->unsigned()->index()->comment('owner of the comment');
            $table->String('content');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('comment');
    }
}
