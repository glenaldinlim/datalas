<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->enum('type', ['News', 'Article']);
            $table->string('title');
            $table->string('slug');
            $table->longText('content');
            $table->string('cover');
            $table->enum('published_status', ['Draft', 'Publish'])->default('Draft');
            $table->timestamp('published_at')->nullable()->default(NULL);
            $table->foreignId('published_by')->nullable()->default(NULL);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('published_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
