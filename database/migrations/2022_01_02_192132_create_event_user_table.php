<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {
            $table->integer('event_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->primary(['event_id', 'user_id']);//added the primary keys
            $table->timestamps();
        });
        Schema::table('event_user', function($table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');//foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_user');
    }
}
