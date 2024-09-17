<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('crud', ['users' => $users]);
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'role' => 'required|string',
    ]);

    $user = User::findOrFail($id);
    $user->update($validated);

    return redirect('/crud')->with('success', 'User updated successfully!');
}


    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully!');
}

}
