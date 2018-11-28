<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 30)->unique();
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->string('first_name', 30)->default('E');
            $table->string('middle_name', 30)->default('E');
            $table->string('last_name', 30)->default('E');
            $table->string('day')->default("E");
            $table->string('month')->default("E");
            $table->string('year')->default("E");
            $table->string('avatar', 250)->default("E");
            $table->string('ip')->default(0);
            $table->string('role')->default(0);
            $table->integer('stage')->default(0);
            $table->integer('country')->default(1);
            $table->string('seat')->default("E");
            $table->boolean('enews')->default(1);
            $table->boolean('eupd')->default(1);
            $table->boolean('mnews')->default(1);
            $table->boolean('mupd')->default(1);
            $table->string('wtel')->default("E");
            $table->string('htel')->default("E");
            $table->string('fax')->default("E");
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
