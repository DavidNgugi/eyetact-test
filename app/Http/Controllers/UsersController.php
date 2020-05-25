<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except(Auth::id());
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|string|required|max:100',
            'email' => 'email|required|max:100',
            'role' => 'string|required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => (new BcryptHasher())->make('password') //default pass
        ])->assignRole($request->role);

        // TODO fire event to send email to user to change password

        return view('users.index')->with('success', 'A new user has been added');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if(!$user) { return back()->with('error', 'User could not be found!'); }

        return view('users.show')->with('user', $user);
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

        return view('users.edit', ['user' => $user]);
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
            'name' => 'bail|string|required|max:100',
            'email' => 'email|required|max:100',
            'role' => 'string|required',
        ]);

        $user = User::where('id', $id)->get();
        $user->name = $request->name;
        $user->email = $request->email;            
        $user->assignRole($request->role);
        $user->save();

        return view('users.index')->with('success', 'User details updated');   
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

        if($user) { $user->delete(); }
        else { return back()->with('error', 'User could not be deleted!'); }

        return view('users.index')->with('success', 'User deleted!');
    }
}
