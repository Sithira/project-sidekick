<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('proposal_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('type');
            $table->double('budget')->default(0)->nullable();
            $table->date('accepted_on')->nullable();
            $table->date('end_date');
            $table->date('expires_in');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->string('reference');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
