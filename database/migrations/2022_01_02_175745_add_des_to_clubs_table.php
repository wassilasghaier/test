<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDesToClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('description')->nullable()->after('name');
            $table->string('photo')->nullable()->after('description');
            $table->date('date_creation')->nullable()->after('photo');
            $table->date('date_debutmarhe')->nullable()->after('date_creation');
            $table->integer('nb_adherent')->nullable()->after('date_debutmarhe');
            $table->integer('is_active')->nullable()->after('nb_adherent')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            //
        });
    }
}
