<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxonomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specimen_id')->constrained();
            $table->string('subfamily')->nullable();
            $table->string('tribe')->nullable();
            $table->string('genus')->nullable();
            $table->string('subgenre')->nullable();
            $table->string('complex')->nullable();
            $table->string('specie')->nullable();
            $table->string('subspecie')->nullable();
            $table->string('author')->nullable();
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
        Schema::dropIfExists('taxonomies');
    }
}
