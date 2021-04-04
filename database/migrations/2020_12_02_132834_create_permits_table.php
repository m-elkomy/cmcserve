<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->string('article_text_status_ar');
            $table->string('article_text_status_en');
            $table->string('search_keyword_ar');
            $table->string('search_keyword_en');
            $table->string('permits_type_ar');
            $table->string('permits_type_en');
            $table->string('permits_name_ar');
            $table->string('permits_name_en');
            $table->string('article_text_ar');
            $table->string('article_text_en');
            $table->string('attachment')->nullable();
            $table->integer('permits_year');
            $table->integer('permits_number');
            $table->integer('article_number');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
    }
}
