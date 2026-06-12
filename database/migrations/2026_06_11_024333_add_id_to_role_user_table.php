<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddIdToRoleUserTable extends Migration
{
   public function up()
{
    // Disable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    Schema::table('role_user', function (Blueprint $table) {
        $table->dropPrimary(['user_id', 'role_id']);
        $table->id()->first();
    });

    // Re-enable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
}

public function down()
{
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    Schema::table('role_user', function (Blueprint $table) {
        $table->dropColumn('id');
        $table->primary(['user_id', 'role_id']);
    });

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
}
}
