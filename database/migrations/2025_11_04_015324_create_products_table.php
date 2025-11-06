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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable(); // 商品画像（任意）
        $table->string('name'); // 商品名
        $table->integer('price'); // 価格
        $table->integer('stock'); // 在庫数
        $table->unsignedBigInteger('company_id'); // メーカーID
        $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
