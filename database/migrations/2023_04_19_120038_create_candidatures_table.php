<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offres_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pdfs_id');
            $table->unsignedBigInteger('paragraphs_id');
            $table->timestamps();

            $table->foreign('offres_id')->references('id')->on('offres')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pdfs_id')->references('id')->on('pdfs')->onDelete('cascade');
            $table->foreign('paragraphs_id')->references('id')->on('paragraphs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatures');
    }
}
