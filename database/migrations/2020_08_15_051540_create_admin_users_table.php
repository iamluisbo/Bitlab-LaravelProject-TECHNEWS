<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'admin_users', 
            function (Blueprint $table) {
                $table->id();
                $table->string('user_name')->unique()->index();
                $table->string('password');
                $table->string('email')->unique();
                $table->string('first_name');
                $table->string('last_name');
                $table->unsignedBigInteger('roles_id');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
