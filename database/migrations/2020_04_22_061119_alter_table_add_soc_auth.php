<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAddSocAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('users', function (Blueprint $table){
           $table->string('id_in_soc',20)
               ->default('')
               ->comment('id в соц сети');
           $table->enum('type_auth',['site','vk','github'])
               ->default('site')
               ->comment('type of auth');
           $table->string('avatar',150)
               ->default('')
               ->comment('link to avatar');
           $table->index('id_in_soc');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
          $table->dropColumn(['id_in_soc','type_auth','avatar']);
        });
    }
}
