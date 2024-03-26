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
        $users = User::all();
        $auth = auth()->user();

        $friendRequestsSend = auth()->user()->friendRequestsSend()->with('sender')->get();
        $friendRequestsReceived = auth()->user()->friendRequestsReceived()->with('receiver')->get();
        $friends = auth()->user()->friends()->with('user')->get();

        return view('friend.index', compact('friendRequestsSend', 'friendRequestsReceived', 'friends', 'users'));
    }
}
