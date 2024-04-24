<?php

namespace App\Http\Controllers\Front_office\Reservations;

use App\Http\Controllers\Controller;
use App\Mail\SendThanks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function sendEmail()
    {
        $user = User::where("id", session("user_id"))->first();
        Mail::to($user)->send(new SendThanks($user));
        return response()->json(['ok'], 200);
    }
}