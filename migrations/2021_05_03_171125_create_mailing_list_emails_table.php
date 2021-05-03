<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailingListEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailing_list_emails', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('mailing_list_id')->nullable();
            $table->foreign('mailing_list_id')->references('id')->on('mailing_lists');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('source')->nullable();
            $table->tinyInteger('subscribed')->nullable()->default(1);
            $table->longText('data')->nullable();
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
        Schema::dropIfExists('mailing_list_emails');
    }
}
