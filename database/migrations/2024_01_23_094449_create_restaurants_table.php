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
        Schema::create('restaurants', function (Blueprint $table) {
            // ID PRIMARY KEY
            $table->id();
            $table->timestamps();
            // USER_ID FOREIGN KEY
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->text('description')->nullable();
            $table->text('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};