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
                    ->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        
        $request->validate([
            'oldPassword' => ['required', 'string'],
            'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        \DB::table('users')->where('id', \Auth::id())->update([
            'password' => \Hash::make($request->newPassword),
        ]);
        
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
