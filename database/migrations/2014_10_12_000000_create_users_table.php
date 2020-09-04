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
            $table->increments('id');

            $table->string('name');
            
            $table->string('email')->nullable();
            
            /** If want using Socialite
             * $table->string('email')->nullable()->unique();
             * $table->string('provider')->nullable();
             * $table->string('provider_id')->nullable();
             * $table->string('password')->nullable();;
             */
            
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();

    
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password')->nullable();;

            $table->string('api_token', 80)->unique()->nullable()->default(null);

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
