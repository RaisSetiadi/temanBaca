<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // kolom primary key auto-increment
            $table->foreignId('post_id')
                  ->constrained()
                  ->onDelete('cascade'); // foreign key ke posts.id, hapus komentar jika post dihapus
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade'); // foreign key ke users.id, hapus komentar jika user dihapus
            $table->foreignId('parent_id')
                  ->nullable()
                  ->constrained('comments')
                  ->onDelete('cascade'); 
              // foreign key ke comments.id (self-relasi), nullable: hanya diisi jika ini balasan komentar
            $table->text('body'); // isi komentar
            $table->timestamps();  // created_at & updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
