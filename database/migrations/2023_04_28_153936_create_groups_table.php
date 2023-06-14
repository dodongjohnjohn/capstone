<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
   public function up()
   {
       Schema::create('groups', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('leader_id')->nullable();
           $table->string('group_name');
           $table->string('leader_name')->nullable();
           $table->timestamps();
       });
   }

   public function down()
   {
       Schema::dropIfExists('groups');
   }
}
