<?php

namespace App\Http\Controllers\Back_office\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back_office\Users\AddUserRequest;
use App\Http\Requests\Back_office\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Back-office.Users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        return back()->with('success', 'Add User successful');
    }

    public function Change_image_profile($image)
    {
        $img = $image;
        $image_name = $img->getClientOriginalName();
        $image = uniqid() . $image_name;
        $img->move('Uploads/', $image);
        return $image;
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
    public function update(UpdateUserRequest $request, string $id)
    {
        $image = $this->Change_image_profile($request->image);
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $image
        ]);
        return back()->with('success', 'Update User successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return back()->with('success', 'Delete User successful');
    }
}