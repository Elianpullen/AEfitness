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
        $auth = Auth::user();
        $receiver = User::find($friend_id);

        $friendRequest = friendRequest::get()
            ->where('sender_id', $friend_id)
            ->where('receiver_id', $auth->id);

        if ($friendRequest->isEmpty()) {
            friendRequest::create([
                'status' => 'pending',
                'sender_id' => $auth->id,
                'receiver_id' => $receiver->id,
                'sent_date' => Carbon::now(),
            ]);
        } else {
            $this->accept($friend_id);
        }
        return redirect('/friend');
    }

    public function cancel($friend_id)
    {
        $auth = Auth::user();

        $friendRequest = friendRequest::select()
            ->where('sender_id', $auth->id)
            ->where('receiver_id', $friend_id);
        $friendRequest->delete();
        return redirect('/friend');
    }

    public function accept($friend_id)
    {
        $auth = Auth::user();

        $friendRequest = FriendRequest::where('sender_id', $friend_id)
            ->where('receiver_id', $auth->id)
            ->first();
        $friendRequest->status = 'accepted';
        $friendRequest->accept_date = Carbon::now();
        $friendRequest->save();

        Friend::create([
            'user_id' => $auth->id,
            'friend_id' => $friend_id,
        ]);

        Friend::create([
            'user_id' => $friend_id,
            'friend_id' => $auth->id,
        ]);
        return redirect('/friend');
    }

    public function reject($sender_id)
    {
        $auth = Auth::user();

        $friendRequest = friendRequest::select()
            ->where('sender_id', $sender_id)
            ->where('receiver_id', $auth->id);
        $friendRequest->delete();
        return redirect('/friend');
    }

    public function remove($friend_id)
    {
        $auth = Auth::user();

        $friend = friend::select()
            ->where('friend_id', $friend_id)
            ->where('user_id', $auth->id);
        $friend->delete();

        $friend = friend::select()
            ->where('friend_id', $auth->id)
            ->where('user_id', $friend_id);
        $friend->delete();
        $friendRequest = friendRequest::select()
            ->where('sender_id', $friend_id)
            ->where('receiver_id', $auth->id);
        $friendRequest->delete();
        $friendRequest = friendRequest::select()
            ->where('sender_id', $auth->id)
            ->where('receiver_id', $friend_id);
        $friendRequest->delete();
        return redirect('/friend');
    }

    public function search(Request $request)
    {
        $name = $request->input('username');
        $results = User::search($name)->get();
        return view('friend.index')->with(compact('results'));
    }
}
