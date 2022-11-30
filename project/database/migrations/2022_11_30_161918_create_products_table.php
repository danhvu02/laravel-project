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
            $table->bigInteger('category_id')->unsigned();
            $table->string('title', 50);
            $table->text('description');
            $table->double('price');
            $table->integer('quantity')->unsigned();
            $table->string('sku', 50);
            $table->string('picture', 100);

            $table->timestamps();
            $table->softDeletes();
            $table->index('title');
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onUpdate('cascade');

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
