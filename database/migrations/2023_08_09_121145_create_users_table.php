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
            $table->string('name', 10);
            $table->string('studentID', 10)->primary();
            $table->string('gender', 10);
            $table->string('mobile', 10)->unique();;
            $table->boolean('riderFlag');
            $table->string('email', 20)->unique();
            $table->string('password', 255);
            $table->string('api_token')->unique();
            $table->dateTime('created_at', $precision = 0);
            $table->dateTime('ended_at', $precision = 0);
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
