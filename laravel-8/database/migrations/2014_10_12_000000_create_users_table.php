<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('name');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'supervisor', 'freelancer', 'none'])->default('none');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->string('no_induk')->unique();
            $table->string('gambar')->default('default.jpg');
            $table->integer('project')->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
