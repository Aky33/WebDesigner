<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = \DB::table('posts')->get()->sortByDesc('id');
        
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
        
        \DB::table('posts')->insert([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', trans('messages.postCreated'));
    }
    
    public function edit(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:posts,id'],
        ]);
        
        $post = \DB::table('posts')->find($request->id);
        
        return view('edit', compact('post'));
    }
    
    public function editSave(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:posts,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
        ]);
        
        \DB::table('posts')->where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        return redirect()->route('home')->with('success', trans('messages.postEdited'));
    }
    
    public function delete(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:posts,id'],
        ]);
        
        \DB::table('posts')->where('id', $request->id)->delete();
        
        return redirect()->route('home')->with('success', trans('messages.postDeleted'));
    }
}