<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasColumn('posts', 'published_at')){
            Schema::table('posts', function(Blueprint $table){
                $table->timestamp('published_at')->after('updated_at')->nullable(true)->default(null);
            });
            \DB::statement('UPDATE posts SET published_at = created_at');
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if(Schema::hasColumn('posts', 'published_at')){
            Schema::table('posts', function(Blueprint $table){
                $table->dropColumn('published_at');
            });
        }
    }
}
