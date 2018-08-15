<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            /*
             * 搬运管理员
            */
            $table->integer('from_id');
            /*
             * 搬运管理员可以临时创建不指定商户的工作
             * */
            $table->integer('to_id')->default(0);
            /*默认状态为0*/
            $table->tinyInteger('status')->default(0);
            $table->double('price')->default(0.0);
            $table->string('order_name')->default("");

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
        Schema::dropIfExists('orders');
    }
}
