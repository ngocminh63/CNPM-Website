<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('MaHoaDon');
            $table->bigInteger('customers_id')->unsigned();
            $table->bigInteger('ships_id')->unsigned();
            $table->string('TenNguoiNhan');
            $table->string('DiaChiNhan');
            $table->string('DienThoai');
            $table->tinyInteger('TrangThai');
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('ships_id')->references('id')->on('ships')->onDelete('cascade');            
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
