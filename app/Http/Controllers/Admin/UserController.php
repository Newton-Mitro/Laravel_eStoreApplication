<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderby('id','DESC')->get();
        return view('backend.users.read')->with('users', $users);
    }

    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:12',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $password = Hash::make($request->password);
//        dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $password;
        $user->image = $request->image;
        $user->role_id = $request->role_id;
        $user->save();
        return Redirect::back()->with('success','A user has been created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.view')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.users.edit')->with('user', $user)->with('roles',$roles);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'string|max:255',
            'phone' => 'required|string|max:12',
        ]);

        $emiail = User::where('email', $request->email)->first();

        $user = User::find($id);
        $user->name = $request->name;
        if ($emiail == null) {
            $user->email = $request->email;
        }
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;
        if ($request->image != null) {
            $user->image = $request->image;
        }
        if($request->password != null){
            if($request->password == $request->password_confirmation){
                $user->password = $request->password;
            }else{
                return Redirect::back()->with('warning','Password and confirm password do not match.');
            }
        }
        $user->save();
        return Redirect::back()->with('success','A user has been updated successfully.');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::back()->with('success','A user has been deleted successfully.');
    }
}
