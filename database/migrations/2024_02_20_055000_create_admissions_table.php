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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->tinyInteger('gender')->comment('0-male,1-female,2-other');
            $table->string('age');
            $table->text('address');
            $table->string('mark_sheet');
            $table->tinyInteger('status')->default(0)->comment('0-pending,1-approved');
            $table->decimal('latitude', 10, 8); 
            $table->decimal('longitude', 10, 8); 
            $table->tinyInteger('is_free_bus_fair')->default(0)->comment('0-not checked,1-free bus fair, 2-no free bus fair');
   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
