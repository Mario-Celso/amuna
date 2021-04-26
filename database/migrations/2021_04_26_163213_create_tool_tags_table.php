<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->timestamps();
            $table->bigInteger('tool_id')->nullable(false)->unsigned();

            $table->foreign('tool_id')->references('id')->on('tools');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tool_tags');
    }
}
