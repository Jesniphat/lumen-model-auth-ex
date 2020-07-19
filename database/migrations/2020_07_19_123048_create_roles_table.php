<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE `roles` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `role` VARCHAR(10) NULL,
            `deleted_at` DATETIME NULL,
            `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`));
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
