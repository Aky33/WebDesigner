<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $DIR = "uploads";
    
    public function index() {
        //todo - rewrite for db use
        
        $files = \Storage::files($this->DIR);
        $dir = $this->DIR;
        
        for($i = 0; $i < count($files); $i++) {
            $string = explode('/', $files[$i]);
            $files[$i] = $string[count($string)-1];
        }

        return view('pics.home', compact('files', 'dir'));
    }
    
    public function create() {
        return view('pics.create');
    }
    
    public function createSave(Response $response) {
        //todo - validation
        
        
    }
    
    public function delete(Request $request) {
        //todo - validation, rewrite for db use
        
        \Storage::delete($this->DIR."/".$request->file);
        return redirect()->back()->with('success', trans('messages.imageDeleted'));
    }
}
