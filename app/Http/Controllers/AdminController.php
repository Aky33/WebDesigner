<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $users = \DB::table('users')->where('id', '<>', \Auth::id())->get();
        
        return view('admin', compact('users'));
    }
    
    public function create() {
        return view('admin/create');
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
        \DB::table('users')->insert([
            'name' => $request->name,
            'password' => \Hash::make($password),
            'admin' => $admin,
        ]);
        
        return redirect('admin')->with('success', trans('messages.userCreated').$password);
    }
    
    public function changePrivilegia(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:users,id'],
        ]);
        
        if (\DB::table('users')->find($request->id)->admin)
            $ans = false;
        else
            $ans = true;
        
        \DB::table('users')->where('id', $request->id)->update([
            'admin' => $ans,
        ]);
        
        return redirect()->back()->with('success', trans('messages.privilegiaChanged'));
    }
    
    public function resetPassword(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:users,id'],
        ]);
        
        $password = $this->generatePassword();
        
        \DB::table('users')->where('id', $request->id)->update([
            'password' => \Hash::make($password),
        ]);
        
        return redirect()->back()->with('success', trans('messages.passwordReset').$password);
    }
    
    public function delete(Request $request) {
        $request->validate([
            'id' => ['numeric', 'exists:users,id'],
        ]);
        
        \DB::table('users')->where('id', $request->id)->delete();
        
        return redirect()->back()->with('success', trans('messages.userDeleted'));
    }
    
    private function generatePassword() {
        return str_random(5);
    }
}
