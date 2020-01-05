<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->only(['store','edit','update','destroy']);
    $this->middleware('identify')->only(['edit','update','destroy']);
  }
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('posts.create', ['post' => $post]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:200']
        ]);
        $post = new Post($params);
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $params = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:200']
        ]);
        $post->fill($params)->save();
        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
