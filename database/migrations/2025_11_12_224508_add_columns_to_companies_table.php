<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('companies', function (Blueprint $table) {
        $table->string('street_address')->nullable();
        $table->string('representative_name')->nullable();
    });
}

public function down()
{
    Schema::table('companies', function (Blueprint $table) {
        $table->dropColumn('street_address');
        $table->dropColumn('representative_name');
    });
}

};
