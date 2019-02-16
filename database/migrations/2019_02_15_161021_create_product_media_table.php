<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_medias', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('product_id')->index();
            $table->string('type');
            $table->string('caption')->nullable();
            $table->string('url');
            $table->boolean('is_main')->default(0);
            $table->boolean('is_publish')->default(0);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('product_medias');
    }
}
