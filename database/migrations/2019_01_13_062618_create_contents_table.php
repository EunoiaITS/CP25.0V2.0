<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['quran', 'hadith', 'manuscript', 'article', 'zikir', 'food']);
            $table->text('title')->nullable();
            $table->longText('trans_arabic')->nullable();
            $table->longText('trans_eng')->nullable();
            $table->longText('trans_malay')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->text('keys')->nullable();
            $table->text('details')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
