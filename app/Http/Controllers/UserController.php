<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|string|min:6',
            'role'      => 'required'
        ]);

        // Hash the password before creating the user
        $data['password'] = bcrypt($data['password']);
        unset($data['role']);
         // $type = $data['type'];
        $role = $request->role;

        $user = User::create($data);

        $user->assignRole($role);
        // $user->assignRole($data['role']);
        // Assign roles to the user


        return redirect('/users')->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deactivate(User $user){
        $user->update(['status' => 0]);
        // $log_entry = Auth::user()->name ." updated a user status to deactivated  with the id# " . $user->id;
        // event(new UserLog($log_entry));

        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'User activated successfully');
    }

    public function activate(User $user){
        abort_if(!$user, 404); // Add this line to check if the user exists

        $user->update(['status' => 1]);
        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'User activated successfully');
    }

}
