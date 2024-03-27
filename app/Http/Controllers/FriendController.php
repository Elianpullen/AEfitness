<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $auth = auth()->user();
        $users = User::all()->where('id', '!=', $auth->id);

        $friendRequestsSend = $auth->friendRequestsSend()
            ->with('sender')
            ->where('status', 'pending')->get();

        $friendRequestsReceived = $auth->friendRequestsReceived()
            ->with('receiver')
            ->where('status', 'pending')->get();

        $friends = $auth->friends()->with('user')->get();

        return view('friend.index', compact('auth', 'users', 'friendRequestsSend', 'friendRequestsReceived', 'friends'));
    }
}
