<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('place');
            $table->string('lang')->nullable();
            $table->string('lat')->nullable();
            $table->date('date');
            $table->string('time');
            $table->float('kilometrage');
            $table->string('nivau')->nullable();
            $table->integer('participants')->default(0);
            $table->integer('club_id')->unsigned()->nullable();
            $table->integer('categorie_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('events', function($table) {
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete("SET NULL");
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("SET NULL");
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
