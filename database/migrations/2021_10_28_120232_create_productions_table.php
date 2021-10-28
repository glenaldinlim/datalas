<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commodity_id');
            $table->foreignId('community_id');
            $table->year('year_production');
            $table->enum('quartal', ['Q1', 'Q2', 'Q3', 'Q4']);
            $table->integer('stock')->default(0)->unsigned();
            $table->timestamps();

            $table->foreign('commodity_id')->references('id')->on('commodities');
            $table->foreign('community_id')->references('id')->on('communities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productions');
    }
}
