<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurNewsTable extends Migration
{
    public function up()
    {
        Schema::create('our_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',500);
            $table->date('date');
            $table->string('photo',150);
            $table->text('text');
            $table->string('author',30);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('our_news');
    }
}
