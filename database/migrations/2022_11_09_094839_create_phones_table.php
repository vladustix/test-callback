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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            // Уникальный номер телефона
            $table->string('number')->unique();
            // Уникальный ID пользователя, владеющего номером для предотвращения ошибок изменений в БД
            $table->unsignedBigInteger('user_id')->unique();
            // ID оператора, владеющего номером
            $table->unsignedBigInteger('operator_id');
        });

        Schema::table('phones', function (Blueprint $table) {
            // Внешний ключ, ссылается на поле id таблицы users
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            // Внешний ключ, ссылается на поле id таблицы operators
            $table->foreign('operator_id')
                ->references('id')
                ->on('operators')
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
        Schema::dropIfExists('phones');
    }
};
