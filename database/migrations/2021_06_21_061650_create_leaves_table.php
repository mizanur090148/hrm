<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('casual')->default(0);
            $table->smallInteger('sick')->default(0);
            $table->smallInteger('annual')->default(0);
            $table->smallInteger('maternity')->default(0);
            $table->smallInteger('paternity')->default(0);
            $table->smallInteger('others')->default(0);
            $table->smallInteger('unpaid')->default(0);
            $table->year('year')->nullable();
            $table->unsignedBigInteger('factory_id');
            $table->timestamps();

            $table->foreign('factory_id')
                ->references('id')
                ->on('factories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
