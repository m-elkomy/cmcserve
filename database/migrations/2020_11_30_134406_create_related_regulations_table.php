<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatedRegulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_regulations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('regulations_id')->unsigned()->nullable();
            $table->foreign('regulations_id')->references('id')->on('regulations')->onDelete('cascade');

            $table->bigInteger('related_regulations')->unsigned()->nullable();
            $table->foreign('related_regulations')->references('id')->on('regulations')->onDelete('cascade');
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
        Schema::dropIfExists('related_regulations');
    }
}
