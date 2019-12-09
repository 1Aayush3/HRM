<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLeaveApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //leaves applies
    public function up()
    {
        //tablename user_leave_applies kkk
        Schema::create('user_leave_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('leave_type_lists_id')->unsigned();
            $table->foreign('leave_type_lists_id')->references('id')->on('leave_type__lists')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->enum('status', ['pending', 'accept', 'reject']);
            $table->string('reject_reason');
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
        Schema::dropIfExists('user_leave_applies');
    }
}
