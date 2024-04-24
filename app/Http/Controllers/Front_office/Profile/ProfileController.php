<?php

namespace App\Http\Controllers\Front_office\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView()
    {
        $user = User::where("id", session("user_id"))->first();
        return view("Front-office.Profile.profile", compact('user'));
    }
}