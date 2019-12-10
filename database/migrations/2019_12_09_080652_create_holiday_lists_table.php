<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 28);
            $table->text('description');
            $table->date('starting_date');
            $table->date('end_date');
            $table->enum('types', ['public', 'float']);
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
        Schema::dropIfExists('holiday_lists');
    }
}
