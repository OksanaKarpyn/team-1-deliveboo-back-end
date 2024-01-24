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

    public function up() {
        Schema::create('dishes', function (Blueprint $table) {

            // ID PRIMARY KEY
            $table->id();
            $table->timestamps();
            // RESTAURANT_ID FOREIGN KEY
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')
            ->references('id')
            ->on('restaurants')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name', 30);
            $table->text('photo')->nullable();
            $table->text('description', 300)->nullable();
            $table->text('ingredients', 250)->nullable();
            $table->decimal('price', 4, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
};
