<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $users = \DB::table('users')->where('id', '<>', \Auth::id())->get();
        
        return view('admin.home', compact('users'));
    }
    
    public function create() {
        return view('admin.create');
    }
    
    public function createSave(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'admin' => ['required', 'numeric'],
        ]);

        if ($request->admin)
            $admin = true;
        else
            $admin = false;
        
        $password = $this->generatePassword();
        
        $user = new User;
        $user->name = $request->name;
        $user->password = \Hash::make($password);
        $user->admin = $admin;
        $user->save();
        
        return redirect()->route('admin.home')->with('success', trans('messages.userCreated').$password);
    }
    
    public function changePrivilegia(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:users,id'],
        ]);
        
        if (\DB::table('users')->find($request->id)->admin)
            $ans = false;
        else
            $ans = true;
        
        $user = User::find($request->id);
        $user->admin = $ans;
        $user->save();
        
        return redirect()->back()->with('success', trans('messages.privilegiaChanged'));
    }
    
    public function resetPassword(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:users,id'],
        ]);
        
        $password = $this->generatePassword();
        
        $user = User::find($request->id);
        $user->password = \Hash::make($password);
        $user->save();
        
        return redirect()->back()->with('success', trans('messages.passwordReset').$password);
    }
    
    public function delete(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:users,id'],
        ]);
        
        User::find($request->id)->delete();
        
        return redirect()->back()->with('success', trans('messages.userDeleted'));
    }
    
    private function generatePassword() {
        return str_random(5);
    }
}
