<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function showUserPost(){
        $users = FacadesDB::table('users')
        ->select('users.id as id', 'posts.title as title','users.name as name')
        ->join('posts', 'users.id', '=', 'posts.user_id')
        ->orderBy('users.id')
        ->groupBy('users.name')
        ->cursorPaginate(25);
        //$groupedBy = $users->groupBy('users.name');
        return view('userposts',["groupedBy"=>$users,"axz"=>$users]);
    }

    public function addPostUser(Request $request){
        $request->validate([
            'username'=>'required | min:3',
            'useremail'=>'email| unique:users,email',
            'password'=>'required | min:6| confirmed'
        ]);
        $user = new User();
        $user->name = $request->username;
        $user->email =  $request->useremail;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(5);
        $user->save();
        return redirect()->route('showallusers')->with('message','User Added Successfully');//////////// Check redirect with status //////////
    }

    public function showallusers(){
        if(Auth::check()){
            $users = User::whereIn('id',[1,2,3,4,5,6,7,8,9])->paginate(5);
            return view('showallusers',compact('users'));
        }
        else{
            return redirect()->route('login')->with('message','Please login first');
        }

    }

    public function update($id){
        $updateId =  User::find($id);
        return view('update',compact('updateId'));
    }

    function updatepostuser($id, Request $request){
        $request->validate([
            'password'=>'required | min:6| confirmed'
        ]);
        $updateuser = User::find($id);
        $updateuser->id = $id;
        $updateuser->password = Hash::make($request->password);
        $updateuser->save();
        return redirect()->route('showallusers')->with('message','User updated successfully');
    }

    function deleteuser($id){
        $updateuser = User::find($id);
        $updateuser->delete();
        return redirect()->route('showallusers')->with('message ','User deleted successfully');
    }
}
