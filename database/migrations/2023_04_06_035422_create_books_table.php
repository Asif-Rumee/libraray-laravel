<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('library');
            $table->string('department');
            $table->string('language');
            $table->string('book_type');
            $table->string('book_title');
            $table->string('isbn');
            $table->string('authors');
            $table->string('publisher');
            $table->string('publish_date');
            $table->string('version');
            $table->string('page_no');
            $table->binary('image')->nullable();
            $table->string('category');
            $table->string('quantity');
            $table->string('price');
            $table->string('condition');
            $table->string('location');
            $table->string('supplier');
            $table->string('received_date');
            $table->binary('ebook')->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
