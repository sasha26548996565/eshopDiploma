<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Collection;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('article')->unique();
			$table->string('title');
			$table->text('description');
            $table->integer('count')->default(0);
			$table->unsignedInteger('price');
			$table->jsonb('properties');
            $table->string('picture')->nullable();
			$table->unsignedTinyInteger('discount')->default(0);
			$table->foreignIdFor(model: Category::class)->nullable()->constrained()->nullOnDelete();
			$table->foreignIdFor(model: Collection::class)->nullable()->constrained()->nullOnDelete();
			$table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
