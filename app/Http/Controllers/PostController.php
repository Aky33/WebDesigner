<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts;
    
    public function __construct() {
        $this->posts = Post::all();
    }

    public function index() {
        $posts = $this->posts->sortByDesc('id');
        
        return view('home', compact('posts'));
    }
    
    public function create() {
        return view('create');
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
        
        return redirect()->route('home');
    }
    
    public function edit(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists: posts, id'],
        ]);
        
        $post = $this->posts->find($request->id);
        
        return view('edit', compact('post'));
    }
    
    public function editSave(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists: posts, id'],
            'title' => ['required', 'string', 'max: 255'],
            'content' => ['required', 'string', 'max: 255'],
        ]);
        
        $this->posts->find($request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        return redirect()->route('home');
    }
    
    public function delete(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists: posts, id'],
        ]);
        
        $this->posts->find($request->id)->delete();
        
        return redirect()->route('home');
    }
}