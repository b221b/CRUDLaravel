<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToServisTable extends Migration
{
    public function up()
    {
        Schema::table('servis', function (Blueprint $table) {
            $table->timestamps(); // Это добавит обе колонки: created_at и updated_at
        });
    }

    public function down()
    {
        Schema::table('servis', function (Blueprint $table) {
            $table->dropTimestamps(); // Удалит обе колонки
        });
    }
}
