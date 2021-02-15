<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('details')->nullable()->before('deleted_at');
            //if you want to use change method should run `composer run doctrine/dbal`
            // $table->string('details', 100)->after('morrrph_id')->change();
            // $table->text('details')->before('morrrph_id');
            // $table->text('details')->first('morrrph_id');
            // $table->text('details')->nullable();
            // $table->text('details')->default('blaa');
            // $table->text('details')->primary();
            // $table->text('details')->index();
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
            //
        });
    }
}
