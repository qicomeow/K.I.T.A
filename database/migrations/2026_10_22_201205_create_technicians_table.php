<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void { Schema::create('technicians',function(Blueprint $table){$table->id();$table->string('name');$table->string('category');$table->string('address',500);$table->string('phone',30);$table->string('email');$table->timestamps();}); }
 public function down():void { Schema::dropIfExists('technicians'); }
};