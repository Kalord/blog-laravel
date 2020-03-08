<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('sex')->notNull();
            $table->integer('body_weight')->notNull();
            $table->string('product')->notNull();
            $table->integer('calories')->notNull();
            $table->integer('proteins')->notNull();
            $table->integer('fats')->notNull();
            $table->integer('carbohydrates')->notNull();
            $table->integer('weight')->notNull();
            $table->integer('views')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
