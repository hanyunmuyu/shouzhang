<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stall', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("addr")->default("");
            /*所有的人员都是member, member存储共用的个人信息*/
            $table->string("member_id");
            $table->string("introduction");

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
        Schema::dropIfExists('stall');
    }
}
