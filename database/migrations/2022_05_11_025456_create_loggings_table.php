<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoggingsTable extends Migration {
    public function up() {
        Schema::create('loggings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->comment('user logging');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('login')->nullable();
            $table->date('logout')->nullable();
            $table->string('login_ip')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('loggings');
    }
}
