<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = \DB::table('posts')->get()->sortByDesc('id');
        
        return view('posts.home', compact('posts'));
    }
    
    public function create() {
        return view('posts.create');
    }
    
    public function createSave(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
        ]);
        
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.home')->with('success', trans('messages.postCreated'));
    }
    
    public function edit(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:posts,id'],
        ]);
        
        $post = Post::find($request->id);
        
        return view('posts.edit', compact('post'));
    }
    
    public function editSave(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:posts,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
        ]);
        
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        
        return redirect()->route('posts.home')->with('success', trans('messages.postEdited'));
    }
    
    public function delete(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:posts,id'],
        ]);
        
        Post::find($request->id)->delete();
        
        return redirect()->route('posts.home')->with('success', trans('messages.postDeleted'));
    }
}