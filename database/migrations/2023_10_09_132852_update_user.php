<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       // First name (required), last name (required), Company (foreign key to Companies), email, phone
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable();
            $table->foreignIdFor(Company::class)->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function($table) {
            $table->dropColumn('last_name');
            $table->dropForeign(['company_id']);
            $table->dropColumn('phone');
        });
    }

};
