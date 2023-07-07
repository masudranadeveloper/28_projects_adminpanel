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
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->text('img1') -> nullable();
            $table->text('links1') -> nullable();
            $table->text('img2') -> nullable();
            $table->text('links2') -> nullable();
            $table->text('img3') -> nullable();
            $table->text('links3') -> nullable();
            $table->text('news') -> nullable();
            $table->text('bg') -> nullable();
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
        Schema::dropIfExists('management');
    }
};
