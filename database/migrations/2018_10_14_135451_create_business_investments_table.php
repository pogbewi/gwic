<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_investments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('businessname');
            $table->string('email');
            $table->text('address');
            $table->text('address_two')->nullable();
            $table->string('nationality');
            $table->json('operation_countries');
            $table->string('city');
            $table->enum('gender', ['male','female']);
            $table->decimal('amount_needed', 19, 2 );
            $table->enum('status', ['operational','potential']);
            $table->boolean('agreed');
            $table->boolean('viewed')->default(false);
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
        Schema::dropIfExists('business_investments');
    }
}
