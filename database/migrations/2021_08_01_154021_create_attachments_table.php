<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
        			$table->id();
        			$table->integer('customer_id');
        			$table->string("file_name");
        			$table->string("file_path");
                    $table->timestamp('created_at')->useCurrent()->nullable();
                    $table->timestamp('updated_at')->useCurrent()->nullable();
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
