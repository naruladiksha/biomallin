<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Whyus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('whyus', function (Blueprint $table) {
            $table->id();
            $table->string('whytitle');
            $table->string('whycontent');
            $table->string('whyimage');
            $table->string('teamcontent');
            $table->string('teambimage');
            $table->string('producttitle');
            $table->string('productcontent');
            $table->string('offertitle');
            $table->string('offercontent');
            $table->string('newsletterbg');
            $table->string('couponbg');
            $table->string('newproducttitle');
            $table->string('newproductcontent');
            $table->string('extratitle');
            $table->string('featuredtitle'); 
            $table->string('featuredcontent');
            $table->string('counter');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
        Schema::drop('whyus');
    }
}
