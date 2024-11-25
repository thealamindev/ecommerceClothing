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
            $table->string('sku')->unique();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('collection_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('long_description');
            $table->string('status')->nullable()->comment('new, sale, hot etc');
            $table->text('primary_image');
            $table->string('primary_image_public_id');
            $table->text('secondary_image')->nullable();
            $table->string('secondary_image_public_id')->nullable();
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
        Schema::dropIfExists('products');
    }
};
