<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuratorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curatorials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specimen_id')->constrained();
            $table->string('prepared_by')->nullable();
            $table->string('prepared_at')->nullable();
            $table->string('determined_by')->nullable();
            $table->string('determined_at')->nullable();
            $table->string('life_stage_sex')->nullable();
            $table->string('medium')->nullable();
            $table->string('owned_by')->nullable();
            $table->string('located_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('collection_code')->nullable();
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
        Schema::dropIfExists('curatorials');
    }
}
