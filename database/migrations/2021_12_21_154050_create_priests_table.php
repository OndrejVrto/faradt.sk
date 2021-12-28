<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priests', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
			$table->string('titles_before')->nullable();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('titles_after')->nullable();
			$table->string('slug');
			$table->string('phone')->nullable();
			$table->string('function')->nullable();
			$table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
			$table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priests');
    }
}
