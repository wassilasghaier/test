<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('uuid')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('phone')->nullable();
            $table->string('cin')->nullable();
            $table->integer('club_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('is_accepted')->default(1);
            $table->timestamps();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete("SET NULL");
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
        Schema::dropIfExists('adherents');
    }
}
