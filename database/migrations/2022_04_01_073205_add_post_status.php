<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostStatus extends Migration {
    public function up() {
        Schema::table('posts', function($table) {
            $table->integer('status')->after('slug')->default(0);
        });
    }

    public function down() {
        Schema::table('posts', function($table) {
            $table->dropColumn('status');
        });
    }
}
