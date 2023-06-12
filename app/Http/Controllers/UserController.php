<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getAll()
    {
        $users = User::orderByDesc('id')->paginate(5);
        $nextPageUrl = $users->nextPageUrl();
        $previousPageUrl = $users->previousPageUrl();
        return view('user.index', ['users' => $users, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
        $user->save();
        return redirect()->route('users.getAll')->with('success','Added successFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
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
        //
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
        $user->save();
        return redirect()->route('users.getAll')->with('success','Added successFully');
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.getAll')->with('success','Delete successFully');
    }

    public function role(Request $request, $id){
        $user = User::with('roles')->find($id);
        if($request->has('user') == 1){
            $user->assignRole('customer');
        }
        else
        {
            $user->removeRole('customer');
        }

        if($request->has('admin') == 1){
            $user->assignRole('admin');
        }
        else
        {
            $user->removeRole('admin');
        }
         return redirect()->route('users.getAll');
        // 
    }
}
