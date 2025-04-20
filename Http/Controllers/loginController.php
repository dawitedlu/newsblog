<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function show() {
        $title = 'Your  Title';
        $description = 'This is a description of the newseujdgvhkjg ejfbhvnikrldgikp[;rjefebcvyxhijehciehioeeojdjsduuijkjhxc.';
        return view('/welcome', compact('title', 'description'));
    }
}
