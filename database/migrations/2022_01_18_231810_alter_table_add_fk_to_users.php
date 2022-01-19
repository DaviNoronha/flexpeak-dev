<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddFkToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('tipo_bug_id')->nullable();

            $table->foreign('perfil_id')->references('id')->on('perfis');
            $table->foreign('tipo_bug_id')->references('id')->on('tipo_bugs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropforeign('users_tipo_bugs_id_foreign');
            $table->dropforeign('users_perfis_id_foreign');
        });
    }
}
