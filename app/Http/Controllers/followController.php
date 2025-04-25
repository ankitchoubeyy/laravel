<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class followController extends Controller
{
    // follow/followe controllers
    public function createFollow(User $user) {
        // You cannot follow yourself
        if($user->id == auth()->user()->id) {
            return back()->with('success', 'you cannot follow yourself.');
        }

        // you cannot follow someone you're already following
        $existCheck = Follow::where(['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id])->count();

        if($existCheck) {
            return back()->with('failure', 'you are already following this account');
        }
        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();
        
        return back()->with('success', 'User successfully followed');
        
    }

    public function removeFollow() {
        
    }

}
