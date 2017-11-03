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

    public function show($id)

    {
        $data['user'] = User::find($id);
        if ($data['user'] == Null) {
            return redirect(route('user.index'));
        } else {
            return view('BackEnd.Admin.User.show', $data);
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

        ], [
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


    public function delete($id)
    {
        $user = User::find($id);
        if ($user == Null) {
            echo "dasf";
        }else{

            $user->delete();
            return redirect()->route('user.index')->with('message', "xoa $user->name dung  thanh cong");
        }




    }

    public function update(Request $request, $id)
    {

        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ], [
            'name.required' => ' Nhap ten',
            'email.required' => ' Nhap email',
            'email.email' => 'khong phai email',
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
                if ($request->input('password')) {
                    $user->password = bcrypt($request->input('password'));
                 }
            }
            $user->save();


        return redirect()->route('user.index')->with('message', "Cap nhap $user->name  thanh cong");

    }


}
