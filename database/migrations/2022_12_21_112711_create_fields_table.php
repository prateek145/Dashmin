<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('access')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->integer('application_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('requiredfield')->default(0);
            $table->integer('requireuniquevalue')->default(0);
            $table->integer('keyfield')->default(0);
            $table->longText('groups')->nullable();
            // $table->string('name')->nullable();
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
        Schema::dropIfExists('fields');
    }
};
