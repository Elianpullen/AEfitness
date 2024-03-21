<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $users = User::all()->where('id', '!=', (Auth::user()->id));
        $friends = Auth::user()->friends; // Retrieve friends
        return view('friend.index', compact('friends', 'users'));
    }

    public function add($friend_id)
    {
        $user = Auth::user();
        $friend = User::find($friend_id);
        $user->friends()->attach($friend->id);
        return redirect('/friend');
    }

    public function remove($friend_id)
    {
        $user = Auth::user();
        $friend = User::find($friend_id);
        $user->friends()->detach($friend->id);
        return redirect('/friend');
    }
}
