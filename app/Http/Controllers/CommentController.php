<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Simpan komentar baru (root comment) pada suatu post
    public function store(Request $request, Post $post)
    {
        // Validasi input
        $validated = $request->validate([
            'body' => 'required|string|max:1000'
        ]);

        // Buat komentar baru terkait user dan post
        Comments::create([
            'user_id' => auth()->id(), // id user saat ini
            'post_id' => $post->id,
            'body'    => $validated['body'],
            'parent_id' => null        // komentar akar, tidak ada parent
        ]);

        // Pengembalian ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('posts.show', $post->id)
                         ->with('success', 'Komentar berhasil ditambahkan.');
    }

  public function reply(Request $request, Comments $parent)
{
    // Pastikan induk adalah komentar akar (tidak membalas balasan) dan belum ada balasan
    // dd($parent->id);
    if ($parent->parent_id !== null) {
        return redirect()->route('posts.show', $parent->post_id)->withErrors('Tidak dapat membalas balasan.');
    }
    if ($parent->replies()->exists()) {
      return redirect()->route('posts.show', $parent->post_id)
                 ->withErrors('Komentar ini sudah memiliki balasan.');

    }

    // Validasi input
    $validated = $request->validate([
        'body' => 'required|string|max:1000'
    ]);

    // Pastikan post_id diteruskan dari komentar induk
    $post_id = $parent->post_id;  // Ambil post_id dari komentar induk

    // Buat komentar baru sebagai balasan
    Comments::create([
        'user_id'   => auth()->id(),
        'post_id'   => $post_id,  // Masukkan post_id yang sesuai
        'body'      => $validated['body'],
        'parent_id' => $parent->id
    ]);

    return redirect()->route('posts.show', $parent->post_id)->with('success', 'Balasan berhasil ditambahkan.');
}

}
