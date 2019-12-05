<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


        public function __construct(){
        // $this->middleware('auth');
        //     OR
         $this->middleware('auth')
            ->only(['create','store']);

    }
    public function index()
    {


        $users = User::all();

        //dd($users);
        //return view ('item.index',compact('items'));
        return view('user.index',compact('users'));
    }


    public function create()
    {
      //  dd("cfraeee");

    }


    public function store(Request $request)
    {
        //dd("strore");

    }


    public function show($id,Request $request)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        $request->session()->flash('status_edit','Edit successfully');

        return redirect()->route('users.index');
    }


    public function edit($id)
    {
       // dd("edit");

    }


    public function update(Request $request, $id)
    {
       // dd("it gores oot UPADTA");

    }


    public function destroy(Request $request, $id)
    {
      //  dd("des");

        $user = User::findOrFail($id);
        $user -> delete();
        $request->session()->flash('status_delete','Delete successfully');

        return redirect()->route('users.index');
    }
}
