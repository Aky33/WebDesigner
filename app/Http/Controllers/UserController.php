<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function password() {
        return view('change/password');
    }
    
    public function passwordSave(Request $request) {
        if (!(\Hash::check($request->oldPassword, \Auth::user()->password))) {
            return redirect()
                    ->back()
                    ->with("error", trans('messages.passwordWrong'));
        }
        
        $request->validate([
            'oldPassword' => ['required', 'string'],
            'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        \DB::table('users')->where('id', \Auth::id())->update([
            'password' => \Hash::make($request->newPassword),
        ]);
        
        return redirect()->back()->with("success", trans('messages.passwordChanged'));
    }
    
    public function lang() {
        $locales = \Config::get('app.locales');
        return view('change.language', compact('locales'));
    }
    
    public function langSelect(Request $request) {
        $request->validate([
            'locale' => ['in:'.implode(',', \Config::get('app.locales'))],
        ]);
        
        \Session::put('locale', $request->locale);
        return redirect()->back()->with('success', trans('messages.langChanged'));
    }
}
