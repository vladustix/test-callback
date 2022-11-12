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
            // ID пользователя исходящего вызова
            $table->unsignedBigInteger('outgoing_id');
            // ID пользователя входящего вызова
            $table->unsignedBigInteger('incoming_id');
            // Дата и время начала вызова
            $table->timestamp('started_at');
            // Дата и время завершения вызова
            $table->timestamp('finished_at');
            // Длительность
            $table->time('duration');
            // Стоимость
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
