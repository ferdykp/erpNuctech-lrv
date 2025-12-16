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
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->string('no_order');
            $table->string('status_order');
            $table->string('custom_abbrev');
            $table->string('total');
            $table->string('order_form');
            $table->string('appointments');
            $table->string('order_type');
            $table->string('time_range');
            $table->datetime('arrived');
            $table->string('estimate_delivery');
            $table->string('release');
            $table->string('sales_staff');
            $table->string('custom_notes');
            $table->string('people_call');
            $table->string('reviewer');
            $table->datetime('date_review');
            $table->string('people_in');
            $table->datetime('date_in');
            $table->string('modified_by');
            $table->string('time_modified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_details');
    }
};
