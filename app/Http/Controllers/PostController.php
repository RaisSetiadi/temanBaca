<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    //

public function index(Request $request)
{
    $query = Post::query();

    // Pencarian berdasarkan judul
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Sorting berdasarkan tanggal
    if ($request->sort == 'oldest') {
        $query->orderBy('created_at', 'asc');
    } elseif ($request->sort == 'newest') {
        $query->orderBy('created_at', 'desc');
    }
    // Sorting berdasarkan judul A-Z atau Z-A
    elseif ($request->sort == 'az') {
        $query->orderBy('title', 'asc');
    } elseif ($request->sort == 'za') {
        $query->orderBy('title', 'desc');
    }

    $posts = $query->get(); // atau ->paginate(10)->withQueryString();

    return view('posts.index', compact('posts'));
}

    public function create(): View
    {
        return view('posts.create');
    }
   
public function store(Request $request): RedirectResponse
{
    // Validate form
    $this->validate($request, [
        'image'     => 'required|image|mimes:jpeg,jpg,png|max:20048',
        'title'     => 'required|min:5',
        'deskripsi' => 'required|min:10',
        'content'   => 'required|min:10'
    ]);

    // Upload image
    $image = $request->file('image');
    $image->storeAs('public/post', $image->hashName());

    // Generate kode_postingan
    $today = Carbon::now()->format('Ymd'); // 20250509
    $prefix = 'POS-' . $today;

    // Hitung jumlah postingan hari ini untuk penomoran
    $countToday = Post::whereDate('created_at', Carbon::today())->count() + 1;
    $number = str_pad($countToday, 4, '0', STR_PAD_LEFT); // 0001, 0002, ...

    $kode_postingan = $prefix . '-' . $number;

    // Simpan ke database
    Post::create([
        'kode_postingan' => $kode_postingan,
        'id_user'        => Auth::id(),
        'image'          => $image->hashName(),
        'title'          => $request->title,
        'deskripsi'      => $request->deskripsi,
        'content'        => $request->content
    
    ]);

    return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);

}
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $posts = Post::findOrFail($id);

        //delete image
        Storage::delete('public/post/' . $posts->image);

        //delete post
        $posts->delete();

        //redirect to index
        return redirect()->route('home')->with(['success' => 'Data Berhasil Dihapus!']);
    }
     public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.show', compact('post'));
    }


     public function edit(string $id): View
    {
        //get post by ID
        $posts = Post::findOrFail($id);

        //render view with post
        return view('posts.edit', compact('posts'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:20048',
            'title'     => 'required|min:5',
            'deskripsi'   => 'required|min:10',
            'content'   => 'required|min:10'
        ]);

        //get post by ID
        $posts = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/post', $image->hashName());

            //delete old image
            Storage::delete('public/post/' . $posts->image);

            //update post with new image
            $posts->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'deskripsi'   => $request->deskripsi,
                'content'   => $request->content
            ]);
        } else {

            //update post without image
            $posts->update([
                'title'     => $request->title,
                'deskripsi'   => $request->deskripsi,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
