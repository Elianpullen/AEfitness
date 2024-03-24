<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\friendRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendRequestController extends Controller
{
    public function request($friend_id)
    {
        $user = Auth::user();
        $receiver = User::find($friend_id);

        $friendRequest = new friendRequest;
        $friendRequest->status = 'pending';
        $friendRequest->sender_id = $user->id;
        $friendRequest->receiver_id = $receiver->id;
        $friendRequest->sent_date = Carbon::now();
        $friendRequest->save();
        return redirect('/friend');
    }

    public function accept($friendRequestId)
    {
//        $user = Auth::user();
        $friendRequest = FriendRequest::findOrFail($friendRequestId);
        $friendRequest->status = 'accepted';
        $friendRequest->accept_date = Carbon::now();
        $friendRequest->save();
        return redirect('/friend');
    }
//
//    public function accept($friend_id)
//    {
//        $user = Auth::user();
//        $friend = User::find($friend_id);
//
//        Friend::where('friend_id', $friend->id)
//            ->where('user_id', $user->id)
//            ->update(['status' => "accepted"]);
//
//        return redirect('/friend');
//    }
//
//    public function decline()
//    {
//
//    }
//
//    public function remove($friend_id)
//    {
//        $user = Auth::user();
//        $friend = User::find($friend_id);
//        $user->friends()->detach($friend->id);
//        return redirect('/friend');
//    }
}
