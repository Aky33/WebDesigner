<?php

namespace App\Http\Controllers;

use App\Image;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $DIR = "public";
    
    public function index() {
        $files = \DB::table('images')->get();
        return view('pics.home', compact('files'));
    }
    
    public function create() {
        return view('pics.create');
    }
    
    public function createSave(Request $request) {
        $request->validate([
            'image' => ['file', 'required', 'mimes:jpg,jpeg,bmp,png']
        ]);
        
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store($this->DIR);
        
        $image = new Image;
        $image->name = $name;
        $image->path = $path;
        $image->save();
        
        return redirect()->route('pics.home')->with('success', trans('massages.imageCreated'));
    }
    
    public function delete(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:images,id']
        ]);
        
        $image = Image::find($request->id);
        \Storage::delete($image->path);
        $image->delete();

        return redirect()->back()->with('success', trans('messages.imageDeleted'));
    }
}