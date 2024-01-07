<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class InsertUserController extends Controller
{
    public function insert(){
        $userLast = User::latest()->first();
        $firstNum = $userLast->id+1;
        $secondNum = $userLast->id+11;
        for($i = $firstNum; $i < $secondNum; $i++){
            $user = new User();
            $user->name = "name".$i;
            $user->email = "email".$i;
            $user->password = "password".$i;
            $user->save();
        }
        $users = User::get();
        return view('user.index', ['users' => $users]);
    }
}
