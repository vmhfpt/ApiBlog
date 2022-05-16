<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_post_id');
            $table->integer('parent_id');
            $table->string('title', 255)->unique();
            $table->string('meta_title', 255);
            $table->string('slug', 255);
            $table->string('description', 255);
            $table->longText('content');
            $table->integer('active');
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
        //
        Schema::drop('post');
    }
};
