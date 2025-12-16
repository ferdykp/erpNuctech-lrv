<?php

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
        Schema::create('customer_manegements', function (Blueprint $table) {
            $table->id();
            $table->string('custom_code');
            $table->string('custom_name');
            $table->string('custom_abbrev');
            $table->string('industry_class');
            $table->string('no_telp');
            $table->string('seller');
            $table->string('fax');
            $table->string('email');
            $table->string('entry_person');
            $table->dateTime('entry_time');
            $table->string('isIt_affective');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_manegements');
    }
};
