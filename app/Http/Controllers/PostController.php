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
        $posts = $this->posts;
        
        return view('home', compact('posts'));
    }
    
    public function create() {
        //todo crete post
    }
    
    public function createSave() {
        
    }
    
    public function edit() {
        //todo update post
    }
    
    public function editSave() {
        
    }
    
    public function delete() {
        //todo delete post
    }
}