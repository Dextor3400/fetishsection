<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user'=>$user,
            'roles'=> Role::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $inputs = request()->validate([
         'username'=>['required', 'string', 'max:255'],
         'name'=>['required', 'string', 'max:255'],
         'email'=>['required', 'email', 'max:255'],
         'avatar'=>['file'],
      ]);

        if ($file =  $request->file('avatar')) {
         $inputs['avatar'] = $file->getClientOriginalName();
         $file->move(public_path('images'), $inputs['avatar']);
         $user->avatar = $inputs['avatar'];
        }
       $user->update($inputs);

       Session::flash('userUpdatedMessage', 'Profile Updated');

       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('userDeletedMessage', 'User was deleted');

        return redirect()->route('admin.users.index');
    }

    public function attachRole(User $user)
    {
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detachRole(User $user)
    {
        $user->roles()->detach(request('role'));

        return back();
    }

}
