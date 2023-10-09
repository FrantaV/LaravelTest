<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('logo_url')->nullable()->change();
            $table->string('website')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
            $table->string('logo_url')->nullable(false)->change();
            $table->string('website')->nullable(false)->change();
        });
    }
};
