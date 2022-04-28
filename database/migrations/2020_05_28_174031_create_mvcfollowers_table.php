<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMvcfollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mvcfollowers', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id_seguito");
            $table->unsignedBigInteger("user_id_follower");
            $table->timestamps();
            $table->primary(["user_id_seguito","user_id_follower"]);
            $table->foreign("user_id_follower")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("user_id_seguito")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('mvcfollowers');
    }
}
