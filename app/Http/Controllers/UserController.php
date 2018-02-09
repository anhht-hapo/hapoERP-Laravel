<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('name','LIKE',"%$request->name%")
                    ->where('email', 'LIKE', "%$request->email%")
                    ->where('address', 'LIKE', "%$request->address%")
                    ->where('birthday', 'LIKE', "%$request->birthday%")
                    ->paginate(5);
        $datas = [
            'users' => $users,
        ];
        return view('admin.users.index',$datas);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(AddUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address= $request->address;
        $user->birthday= $request->birthday;
        if ($request->hasFile('avatar')) {
            $avatarName = $request->file('avatar')->getClientOriginalName();
            $avatarName = time().'_'.$avatarName;
            $user->avatar = $avatarName;
            $request->file('avatar')->move('uploads/avatar/',$avatarName);
        } else {
            $user->avatar = "default.jpg";
        }
        $user->save();
        return redirect()->route('users.index')->
        with(['success'=>'Successful registration!']);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
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
        $user = User::findOrFail($id);
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
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->address= $request->address;
        $user->email = $request->email;
        $user->birthday= $request->birthday;
        $user->updated_at = Carbon::now();
        $filePath = public_path('uploads/avatar/'.$user->avatar);
        if ($request->hasFile('avatar')) {
            if (is_file($filePath))
            {
                unlink($filePath);
            }
            $avatarName = $request->file('avatar')->getClientOriginalName();
            $avatarName = time().'_'.$avatarName;
            $user->avatar = $avatarName;
            $request->file('avatar')->move('uploads/avatar/',$avatarName);
        }
        $user->save();
        return redirect()->route('users.index')->
        with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $message = "$user->name was deleted successfully";
        $user->delete();
        return redirect()->route('users.index')->with('success',$message);
    }
}
