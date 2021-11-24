<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_role', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->primary(['menu_id', 'role_id']);//added the primary keys
            $table->timestamps();
        });
       
    Schema::table('menu_role', function($table) {
        $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');//foreign key
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');//foreign key
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_role');
    }
}
