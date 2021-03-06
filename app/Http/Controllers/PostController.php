<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Postモデルを使う宣言
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        // postsテーブルからすべてのデータを取ってくる
        $posts = Post::all();
        // dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    // Request = ファザード（Laravelの技法）
    public function store(Request $request)
    {
        // $requestに入っている値を、new Postでデータベースに保存する
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        // Auth::id = データを送ったユーザー
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        // postsテーブルから1つのidのデータを取ってくる
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (Auth::id() !== $post->user_id) {
            return abort(404);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}