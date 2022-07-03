<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * This table will store the data fetched from Bitfinex API only for BTC/USD
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btc_statistics', function (Blueprint $table) {
            $table->id();
            $table->decimal('mid', 21, 8);
            $table->decimal('bid', 21, 8);
            $table->decimal('ask', 21, 8);
            $table->decimal('last_price', 21, 8);
            $table->decimal('low', 21, 8);
            $table->decimal('high', 21, 8);
            $table->decimal('volume', 21, 17);
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
        Schema::dropIfExists('ticker');
    }
};
