<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsPhotoTable extends Migration
{
    public function up()
    {
        Schema::create('dogs_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dogs');
            $table->string('photo');
            $table->timestamps();
            $table->unique('id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dogs_photos');
    }
}
