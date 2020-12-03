<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('integrate_time')->comment('积分更改时间');
            $table->string('address',30)->comment('收获明细');
            $table->string('integ',30)->comment('积分');
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
        Schema::dropIfExists('integrates');
    }
}
