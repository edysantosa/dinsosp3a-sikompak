<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*
    Keterangan kenapa membuat tabel seperti ini untuk Many to Many relationship di laravel

    1.  The name of the pivot table should consist of singular names of both tables,
        separated by underscore symbols, and these names should be arranged in alphabetical order,
        so we have to have category_product, not product_category.
    2.  To create a pivot table, we can create the simple migration with artisan make:migration
        or use the community package Laravel 5 Generators Extended.
        For example, we have the command artisan make:migration:pivot.
    3.  Pivot table fields: by default, there should be only two fields – the foreign key to each table,
        in our case category_id and product_id. You can insert more fields if you need,
        then you need to add them to the relationship assignment.
 */


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('role_id');
            // $table->unsignedBigInteger('role_id');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete->('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete->('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('role_user');
    }
};
