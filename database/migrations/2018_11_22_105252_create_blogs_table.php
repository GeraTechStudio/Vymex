<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blog_slug', 160)->default('E');
            $table->string('blog_name', 140)->default('E');
            $table->integer('blog_category')->default(0);
            $table->text('blog_desk_SEO');
            $table->text('blog_key_SEO');
            $table->string('blog_img')->default('E');
            $table->integer('blog_show')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
