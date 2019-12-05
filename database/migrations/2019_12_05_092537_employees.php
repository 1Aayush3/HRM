<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('alt_email',50)->unique()->after('email');
            $table->enum('gender',['M','F','O'])->after('password');
            $table->date('dob')->after('password');
            $table->date('joined')->after('dob');
            $table->date('left')->nullable()->after('joined');
            $table->date('review')->nullable()->after('left');
            $table->string('acc',25)->unique()->after('review');
            $table->string('bank')->after('acc');
            $table->string('branch')->after('bank');
            $table->string('pan')->after('branch');
            $table->string('cit',15)->after('pan');
            $table->string('image')->nullable()->after('cit');
            $table->string('citizenship')->nullable()->after('image');
            $table->string('cit_img')->nullable()->after('citizenship');
            $table->string('pan_img')->nullable()->after('cit_img');
            $table->string('contract')->nullable()->after('pan_img');
            $table->string('appointment')->nullable()->after('contract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
