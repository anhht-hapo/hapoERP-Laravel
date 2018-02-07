<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $datas = [
            'users' => $users,
        ];
        return view('admin.users.index',$datas);
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address= $request->address;
        $user->birthday= $request->birthday;
        $user->save();
        return redirect('admin.users.index')->
        with(['flash_level'=>'success','flash_massage'=>'Successful registration!']);
    }


    public function show($id)
    {
        $user = User::find($id)->get();
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
        $user = User::find($id)->get();
        $datas = [
            'user' => $user,
        ];
        return view('admin.users.exit',$datas);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
