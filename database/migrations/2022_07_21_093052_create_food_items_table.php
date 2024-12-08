<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('food_item_name')->unique();
            $table->string('food_item_slug');
            $table->text('food_item_details');
            $table->string('food_item_img')->nullable();
            $table->float('price');
            $table->string('spice_level','10');
            $table->string('sugar_level','10')->default('None');
            $table->integer('number_of_total_ratings')->default(0);
            $table->double('total_rating_point')->default(0);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('food_items');
    }
}


