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
            $table->bigIncrements('id');
            $table->string('username',30)->comment('用户名');
            $table->unique('username');
            $table->string('password',50)->comment('用户密码');
            $table->enum('sex',['男','女'])->default('男')->comment('性别');
            $table->char('phone',15)->nullable()->comment('用户名');
            $table->unique('phone');
            $table->string('email',100)->nullable()->comment('用户名');
            $table->unique('email');
            $table->string('icon',255)->comment('用户头像');
            $table->timestamps();
            $table->softDeletes();
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
