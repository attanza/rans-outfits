<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('product_category_id')->unsigned()->index();
            $table->string('code', 20)->index()->unique();
            $table->string('name');
            $table->string('slug');
            $table->integer('regular_price');
            $table->integer('sell_price')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('stock');
            $table->integer('stock_status_id')->unsigned();
            $table->integer('ordering')->nullable();
            $table->string('material')->nullable();
            $table->text('tags')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_publish')->default(0);
            $table->softDeletes();
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
}
