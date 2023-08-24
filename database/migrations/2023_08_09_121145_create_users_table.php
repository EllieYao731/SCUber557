<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->string('studentID', 10)->primary();
            $table->string('password', 20)->nullable()->default(null);
            $table->string('name', 3)->nullable()->default(null);
            $table->string('gender', 2)->nullable()->default(null);
            $table->string('mobile', 10)->nullable()->default(null);
            $table->string('email', 10)->nullable()->default(null);
            $table->tinyInteger('riderFlag')->nullable()->default(null);
            // new 
            $table->string('api_token')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};
