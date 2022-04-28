<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMvcpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mvcposts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
             
            $table->string("title",50);
           // $table->dateTime('created_at', 0);
            $table->string("description",50);
            $table->string('service');
            $table->string('url_img')->nullable();
           // $table->unsignedBigInteger("likes");
            $table->timestamps();
            $table->dateTime("date");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mvcposts');
    }
}
