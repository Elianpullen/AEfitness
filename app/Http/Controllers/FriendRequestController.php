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

        $friendRequest = friendRequest::all()
            ->where('sender_id', $friend_id)
            ->where('receiver_id', $user->id);
        if (empty($friendRequest)) // If true
        {
            $friendRequest = new friendRequest;
            $friendRequest->status = 'pending';
            $friendRequest->sender_id = $user->id;
            $friendRequest->receiver_id = $receiver->id;
            $friendRequest->sent_date = Carbon::now();
            $friendRequest->save();
        } else {
            $this->accept($friend_id);
        }

        return redirect('/friend');
    }

    public function cancel($friend_id)
    {
        $user = Auth::user();
        $friendRequest = friendRequest::select()
            ->where('sender_id', $user->id)
            ->where('receiver_id', $friend_id);
        $friendRequest->delete();
        return redirect('/friend');
    }

    public function accept($sender_id)
    {
        $user = Auth::user();
        $friendRequest = FriendRequest::where('sender_id', $sender_id)
            ->where('receiver_id', $user->id)
            ->first();

        $friendRequest->status = 'accepted';
        $friendRequest->accept_date = Carbon::now();
        $friendRequest->save();
        return redirect('/friend');
    }

    public function reject($sender_id)
    {
        $user = Auth::user();
        $friendRequest = friendRequest::select()
            ->where('sender_id', $sender_id)
            ->where('receiver_id', $user->id);
        $friendRequest->delete();
        return redirect('/friend');
    }
}
