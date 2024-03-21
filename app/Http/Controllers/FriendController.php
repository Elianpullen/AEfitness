<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $friends = $user->friends; // Retrieve friends
        return view('friend.index', compact('friends', 'user'));
    }
}
