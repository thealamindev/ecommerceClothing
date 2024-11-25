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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->decimal('purchase_price', total: 8, places: 2);
            $table->decimal('selling_price', total: 8, places: 2);
            $table->decimal('offer_price', total: 8, places: 2)->nullable();
            $table->integer('quantity');
            $table->integer('sold_quantity')->default(0);
            $table->integer('lot_no');
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
        Schema::dropIfExists('inventories');
    }
};
