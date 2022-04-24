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
        Schema::create('cart_storage', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->longText('cart_data');
            $table->float('total_sum');
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('pay');
            $table->string('phone');
            $table->boolean('status')->default(1); // 1-не выполнен, 2-выполнен
            $table->string('frame')->nullable();
            $table->string('apartment')->nullable();
            $table->string('entrance')->nullable();
            $table->string('floor')->nullable();
            $table->string('intercom')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('cart_storages');
    }
};
