<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->text('checkout_id')->nullable();
            $table->text('status')->nullable();
            $table->text('subscription_id')->nullable();
            $table->text('type')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dateTime('allow_till')->default(NULL)->nullable();
            $table->text('subscription_id')->default(NULL)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
};
