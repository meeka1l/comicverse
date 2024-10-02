<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorIdToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Add the 'author_id' column, assuming the 'users' table holds authors
            $table->unsignedBigInteger('author_id')->nullable()->after('id'); // Assuming after 'id'
            
            // Optional: Add a foreign key constraint, linking to the 'users' table
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // Drop the foreign key constraint first (if added)
            $table->dropForeign(['author_id']);
            
            // Then drop the 'author_id' column
            $table->dropColumn('author_id');
        });
    }
}
