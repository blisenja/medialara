<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private function storeImage($file) {
        $nameFile = rand() . $file->getClientOriginalName();
        $file->move('uploads', $nameFile);
        return '/uploads/' . $nameFile;
    }

    public function index() {
        $userId = Auth::id();

        $posts = User::find($userId)->posts()->get();
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'=> ['required'],
            'caption'=> ['required'],
            'image'=> ['required', 'mimes:png,jpg,jpeg,webp']
        ]);

        $imagePath = $this->storeImage($request->file("image"));

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'caption' => $request->caption,
            'image' => $imagePath
        ]);

        return redirect()->route('home');
    }

    public function delete (string $id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route("post.index");
    }

    public function update (Request $request, string $id) {
        $request->validate([
            'title' => ['required'],
            'caption' => ['required'],
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->image = $request->file('image') ? $this->storeImage($request->file('image')) : $post->image;

        $post->save();

        return redirect()->route('post.index');
    }

    public function view (string $id) {
        $post = Post::find($id);

        return view('post.update', [
            'post' => $post
        ]);
    }
}
