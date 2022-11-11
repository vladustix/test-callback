<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outgoing_id');
            $table->unsignedBigInteger('incoming_id');
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->time('duration');
            $table->integer('cost');
        });

        Schema::table('calls', function (Blueprint $table) {
            // Внешний ключ, ссылается на поле id таблицы users
            $table->foreign('outgoing_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            // Внешний ключ, ссылается на поле id таблицы users
            $table->foreign('incoming_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
};
