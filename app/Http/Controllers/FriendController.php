<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $users = User::all()->where('id', '!=', (Auth::user()->id));
        return view('friend.index', compact('users'));
    }
}
