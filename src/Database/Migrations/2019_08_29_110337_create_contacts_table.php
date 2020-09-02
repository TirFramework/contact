<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('type')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('subject')->nullable();
            $table->string('file')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('visti_at')->useCurrent = true;
            $table->timestamps();
            $table->softDeletes();

        });

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('contacts');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
