<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // ID PRIMARY KEY
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('address');
            $table->string('status');
            $table->text('notes')->nullable();
            $table->decimal('tot_price', 8, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
