<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('cpc', 8, 2)->default(0);
            $table->integer('cpc_value')->default(0);
            $table->double('cpv', 8, 2)->default(0);
            $table->integer('cpv_value')->default(0);
            $table->text('content')->nullable();
            $table->timestamps();
        });

//        Artisan::call('db:seed', ['--class' => AdTypesTableSeeder::class, '--force' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_types');
    }
}
