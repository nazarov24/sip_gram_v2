<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTariffHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_tariff_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_history_id');
            $table->unsignedBigInteger('base_tariff_id');
            $table->unsignedBigInteger('model_id')->nullable()->comment('Кто изменял ID пользователя');
            $table->string('model')->nullable()->comment('Кто изменял логин или тип пользователя');
            $table->enum('step', ['afterUpdate', 'forUpdate', 'afterCreate'])->nullable();
            $table->string('name');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('calc_type_id')->nullable()->comment('Тип расчёта тарифа');
            $table->unsignedBigInteger('type_tariff_id')->comment('Шаблон (тип) тарифа');
            $table->integer('sort')->default(999)->comment('Поджарк');
            $table->double('min_price')->comment('Мин. стоимость');
            $table->double('delivery_price')->comment('Цена подачи');
            $table->double('check_in_price')->comment('Заезд');
            $table->double('price_km_intercity')->comment('Цена за 1 км (межгород)');
            $table->double('price_km_city')->comment('Цена за 1 км (город)');
            $table->double('price_hour')->comment('Цена за 1 час');
            $table->double('min_penalty')->default(0)->comment('Минимальная штрафная цена');
            $table->double('price_advertising')->default(0)->comment('Порог расстояния для рекламы цены');
            $table->double('price_by_performers')->default(0);
            $table->integer('seats')->nullable();
            $table->double('free_waiting_of_client_in_minute')->default(0)->comment('Бесплатное ожидание клиента в минутах');
            $table->tinyInteger('is_active')->default(1)->comment('Блокирование');
            $table->tinyInteger('is_archive')->default(0)->comment('Архив тарифа');
            $table->enum('color', ['white', 'red', 'green'])->default('green')->comment('Цветовые обозначение базового тарифа');
            $table->integer('active_version')->default(1)->comment('Номер последней активной версии базового тарифа');
            $table->integer('count_updated')->default(0)->comment('Кол-во обновления тарифа');
            $table->tinyInteger('is_working')->default(1)->comment('Если рабочий тариф по 1 иначе 0');
            $table->tinyInteger('is_send_push_new_order')->default(1)->comment('Отправить push-уведомления о новом заказе с данным тарифом в приложениях исполнителей');
            $table->unsignedBigInteger('created_by')->nullable()->comment('Пользователь который создал этот тариф');
            $table->tinyInteger('auto_assignment')->default(0)->comment('Автоназначение заказа с данным тарифом');
            $table->double('coefficient')->default(1)->comment('Коэффициент увеличения итоговой цены заказа');
            $table->text('description')->nullable()->comment('Описание тарифа');
            $table->text('reason_active_version')->nullable()->comment('Причина обновления активной версии тарифа');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

           
            $table->foreign('base_tariff_id')->references('id')->on('base_tariffs')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('type_tariff_id')->references('id')->on('type_tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_tariff_histories');
    }
}
