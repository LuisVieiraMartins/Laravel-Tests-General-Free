<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function check_update(string $name, string $email)
    {

        $user = User::updateOrCreate([
            'name' => $name,
        ], [
            'email' => $email,
            'password' => Str::password(),
        ]);

        return $user->name;
    }
}
