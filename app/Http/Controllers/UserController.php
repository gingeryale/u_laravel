<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function registerUser(Request $request){
        $registerfields = $request->validate([
            'username' => ['required', 'min:4', 'max:28', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $registerfields['password'] = bcrypt($registerfields['password']);
        User::create($registerfields);
        return 'page';
    }
}
