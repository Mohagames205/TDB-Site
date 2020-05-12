<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplystatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applystatuses', function (Blueprint $table) {
            $table->id();
            $table->text("change_text");
            $table->text("color");
            $table->timestamps();
        });

        DB::table("applystatuses")->insert([
            ["change_text" => "Approved", "color" => "success"], ["change_text" => "Denied", "color" => "danger"], ["change_text" => "Review", "color" => "primary"]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applystatuses');
    }
}
