<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specimen_id')->constrained();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('municipality')->nullable();
            $table->string('locality')->nullable();
            $table->string('site')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('altitude')->nullable();
            $table->string('collected_at')->nullable();
            $table->string('method')->nullable();
            $table->string('habitat')->nullable();
            $table->string('microhabitat')->nullable();
            $table->string('collector_1')->nullable();
            $table->string('collector_2')->nullable();
            $table->string('relation')->nullable();
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
        Schema::dropIfExists('collections');
    }
}
