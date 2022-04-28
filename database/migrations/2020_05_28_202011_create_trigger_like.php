<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerLike extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::raw('
        CREATE TRIGGER `addlikes`
         AFTER INSERT ON `mvclikes` 
         FOR EACH ROW 
         begin 
         UPDATE mvcposts set likes=likes+1 
         where mvcposts.id=NEW.post_id; 
         end
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::raw('
        DROP TRIGGER IF EXISTS `addlikes`
        ');
    }
}
