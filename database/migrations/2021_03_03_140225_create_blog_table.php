<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->notNullable();
            $table->text('content')->notNullable();
            $table->bigInteger('user_id')->unsigned()->notNullable();
            
            //1.updated 2.rejected 3.accepted
            $table->integer('status')->length(1)->nullable()->default(0);
            $table->dateTime('accepted_at')->nullabel();
            $table->boolean('flag_active')->notNullable()->default(0);
            
            //relasi antara tabel blog dengan tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('blog');
    }
}
