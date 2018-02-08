<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        if (!empty($request->name)) {
            $users = $users->where('name','LIKE',"%$request->name%");
        }
        if (!empty($request->email)) {
            dd(2);
            $users = $users->where('email', 'LIKE', "%$request->email%");
        }
        if (!empty($request->address)) {
            dd(3);
            $users = $users->where('address', 'LIKE', "%$request->address%");
        }
        if (!empty($request->birthday)) {
            dd(4);
            $users = $users->where('birthday', $request->birthday);
        }
        $datas = [
            'users' => $users,
        ];
        return view('admin.users.index',$datas);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|min:6|regex:/^[A-z][A-z\s\.\']+$/",
            'email' => 'required|email|unique:users',
            'birthday' => 'required|date|before:now'

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address= $request->address;
        $user->birthday= $request->birthday;
        $user->save();
        return redirect('users')->
        with(['success'=>'Successful registration!']);
    }

    public function show($id)
    {
        $user = User::where('id',$id)->get();
        $datas = [
            'user' => $user,
        ];
        return view('admin.users.index',$datas);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $datas = [
            'user' => $user,
        ];
        return view('admin.users.edit',$datas);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|min:6|regex:/^[A-z][A-z\s\.\'] + $/",
            'birthday' => 'required|date|before:now'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->address= $request->address;
        $user->birthday= $request->birthday;
        $user->save();
        return redirect('users')
            ->with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $message = "$user->name was deleted successfully";
        $user->delete();
        return redirect('users')
            ->with('success',$message);
    }
}
