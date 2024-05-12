<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index(Request $request)
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

        if ($request->exists('username')) {
            $name = $request->input('username');
            if (empty($name)) {
                $results = User::all()->where('id', '!=', $auth->id);
            } else {
                $results = User::search($name)->get()->where('id', '!=', $auth->id);
            }
            return view('friend.index', compact('auth', 'users', 'friendRequestsSend', 'friendRequestsReceived', 'friends', 'results'));
        } else {
            return view('friend.index', compact('auth', 'users', 'friendRequestsSend', 'friendRequestsReceived', 'friends'));
        }
    }
}
