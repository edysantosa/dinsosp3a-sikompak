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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_title', 255)->default(null);
            $table->integer('parent_id')->default(0);
            $table->tinyInteger('sort_order')->default(0);
            $table->string('slug', 255)->default(null);
            $table->string('icon', 255)->default('');
            $table->string('allowed_gates', 255)->default(null);
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
        Schema::dropIfExists('menus');
    }
};
