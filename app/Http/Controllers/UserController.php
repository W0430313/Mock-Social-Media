<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.check');
    }


    public function index(Request $request)
    {
            $data = User::all();
            return view('users.index',compact('data'));

    }

    public function create()
    {
        $role = Role::all();
//        dd($role);
        return view('users.create', compact('role'));
    }

    public function store()
    {

//        dd(\request());
        $data = request()->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required',
                'roles' => 'required'
            ]
        );

//        $data = \request();
//        dd($data);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users');

    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(User $user)
    {

        $data = \request()->validate([
            'name' => 'required',
            'email' => 'required | email',
            'id'=> 'required'
        ]);

//        dd($data['user_id']);
        $user = User::find($data['id']);

//        $user->name = $data['name'];
//        $user->email = $data['email'];
//        dd($user);
        $user->update($data);
        return redirect('/admin/users');
    }
}
