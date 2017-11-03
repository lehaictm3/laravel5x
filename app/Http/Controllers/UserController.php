<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['users'] = User::paginate(15);
        return view('BackEnd.Admin.User.index', $data);

    }

    public function show()
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',

        ],[
            'name.required' => ' Nhap ten',
            'email.required' => ' Nhap email',
            'email.email' => 'khong phai email',
            'password.required' => 'chua nhap mat khau',

        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $user = User::create([
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "password" => bcrypt($request->input('password')),

            ]);
            return redirect()->route('user.index')->with('message', "them $user->name dung  thanh cong");
        }

    }

    public function create()
    {
        return view('BackEnd.Admin.User.create');

    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',

        ],[
            'name.required' => ' Nhap ten',
            'email.required' => ' Nhap email',
            'email.email' => 'khong phai email',
            'password.required' => 'chua nhap mat khau',

        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $user = User::create([
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "password" => bcrypt($request->input('password')),

            ]);
            return redirect()->route('user.index')->with('message', "them $user->name dung  thanh cong");
        }

    }

    public function delete()
    {


    }


}
