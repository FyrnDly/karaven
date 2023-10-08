<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class RootController extends Controller
{
    /**
     * Tampilan Dashboard
     */
    public function index(){
        $users = User::where('role','!=','root')->orderBy('role','desc')->orderBy('name','asc')->get();
        return view('dashboard',[
            'users'=>$users
        ]);
    }

    /**
     * Ubah status user
     */
    public function update(Request $request, $id){
        $user = User::where('id', $id)->first();
        if ($user == null) { return abort(404); }

        if ($user->role == 'admin') {
            $user->role = 'user';
            $user->save();
        } else {
            $user->role = 'admin';
            $user->save();
        }
        
        return Redirect::route('dashboard.index')->with('status','update')->with('user', $user);
    }

    /**
     * Hapus user
     */
    public function destroy(Request $request, $id){
        $user = User::where('id', $id)->first();
        if ($user == null) { return abort(404); }
        $user->delete();
        
        return Redirect::route('dashboard.index')->with('status','remove')->with('user', $user);
    }
}