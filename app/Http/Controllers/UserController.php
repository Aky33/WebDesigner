<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function password() {
        return view('options.password');
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
        
        $user = User::find(\Auth::id());
        $user->password = \Hash::make($request->newPassword);
        $user->save();
        
        return redirect()->back()->with("success", trans('messages.passwordChanged'));
    }
    
    public function lang() {
        $locales = \Config::get('app.locales');
        return view('options.language', compact('locales'));
    }
    
    public function langSelect(Request $request) {
        $request->validate([
            'locale' => ['in:'.implode(',', \Config::get('app.locales'))],
        ]);
        
        \Session::put('locale', $request->locale);
        return redirect()->back()->with('success', trans('messages.langChanged'));
    }
}
