<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $data = User::all();

        return view('users.users', ['data' => $data]);
    }
    public function edit($id)
    {
        $data = new User();
        return view('users.user-edit', ['data' => $data->find($id)]);
    }

    public function update($id, UserRequest $red) // редактирование записи
    {
        $users = User::find($id);
        $users->name = $red->input('name');
        $users->phone = $red->input('phone');
        $users->dob = $red->input('dob');
        $users->gender = $red->input('gender');
        $users->email = $red->input('email');
        $users->group = $red->input('group');

        $users->save();

        return redirect()->route('home')->with('success', 'Пользователь был изменен');
    }
    public function bartenders()
    {
        $data = DB::table('users')->where('group', '2')->orderBy('created_at')->get();
        return view('users.users', ['data' => $data]);
    }
    public function clients()
    {
        $data = DB::table('users')->where('group', '1')->orderBy('created_at')->get();
        return view('users.users', ['data' => $data]);
    }

    public function addForm()
    {
        return view('users.user-add');
    }

    public function add(UserRequest $red) // добавление записи
    {
        $users = new User();
        $users->name = $red->input('name');
        $users->phone = $red->input('phone');
        $users->dob = $red->input('dob');
        $users->gender = $red->input('gender');
        $users->email = $red->input('email');
        $users->group = $red->input('group');

        $users->save();

        return redirect()->route('users')->with('success', 'Пользователь был добавлен');
    }
}
