<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|max:255',
            'password_confirm' => 'required|same:password',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        session()->flash('msg', 'Successfully Created!');
        return redirect()->route('adminUsers');
    }

    public function edit($id)
    {
        if ($id) {
            $user = User::findOrFail($id);
        } else {
            $user = auth()->user();
        }
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'user_id' => 'required',
            'email' => 'required|max:255',
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6|max:255',
            'confirm_password' => 'required',
        ]);
        $user = User::findOrFail($request->user_id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => $user->password]);
        }

        if (html_entity_decode($request->email) == "admin@test.com") {
            return redirect()->back()->withErrors(['email' => 'You must change your email address']);
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user->fill($data);
        $user->save();

        session()->flash('msg', 'Successfully Updated!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        if (auth()->user()->id == 1) {
            User::destroy($id);
            session()->flash('msg', 'Successfully Deleted!');
            return redirect()->route('adminUsers');
        } else {
            abort(403);
        }
    }
}
