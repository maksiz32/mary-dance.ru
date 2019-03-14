<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLittersTable extends Migration
{
    public function up()
    {
        Schema::create('litters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('litter', 2);
            $table->string('descrp');
            $table->string('photo1');
            $table->string('photo2');
            $table->integer('idDog1', false);
            $table->integer('idDog2', false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('litters');
    }
}
