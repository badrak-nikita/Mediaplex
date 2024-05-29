<?php

namespace App\Http\Controllers;

use App\Models\Chackout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile($id)
    {
        if(Auth::id())
        {
            $user = User::find($id);
            $userId = $user->id;
            $chackout = Chackout::where('user_id', '=', $userId)->where('payment_status', 'Оплачено')->get();
            return view('home.profile', compact('user', 'chackout'));
        }
        else
        {
            return redirect('auth/login');
        }
    }
}