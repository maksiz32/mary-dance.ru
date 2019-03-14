<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurDogsTable extends Migration
{
    public function up()
    {
        Schema::create('our_dogs', function (Blueprint $table) {
            $table->increments('id_dogs');
            $table->unsignedTinyInteger('sex');
            $table->string('name');
            $table->date('date_age');
            $table->string('family', 3)->nullable();
            $table->string('dbres')->nullable();
            $table->unsignedTinyInteger('sale');
            $table->timestamps();
            $table->unique('id_dogs');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('our_dogs');
    }
}
