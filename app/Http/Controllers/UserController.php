<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function register(Request $request) {
        $this->validate($request, [
           'email' => 'email|required',
           'password' => 'min:4'
        ]);

        $buildQuery = [
          'email' => str_replace(' ', '', strtolower($request->input('email'))),
          'password' => str_replace(' ', '', Hash::make($request->input('password'))),
          'permission' => '0',
          'created_at' => new \DateTime(),
          'updated_at' => new \DateTime()
        ];


        if (!$this->isUser($buildQuery['email'])) {
            $result = DB::table(env("DB_USERS"))
                ->insert($buildQuery);

            if ($result) {
                return redirect(route('Login'));
            } else {
                return back()->with('error', 'An error has occurred while we register you in!');
            }
        } else {
            return back()->with('error', 'An user with this Email exists!');
        }
    }

    public function isUser($email) {
        $result = DB::table(env("DB_USERS"))
            ->select("ID")
            ->where('email', $email)
            ->get()
            ->toArray();

        return count($result) > 0 ? true : false;
    }

    public function login(Request $request) {
        $this->validate($request, [
           'email' => 'email|required',
           'password' => 'min:4'
        ]);

        $buildQuery = [
          'email' => strtolower($request->input('email')),
          'password' => $request->input('password')
        ];

        if (!Auth::attempt($buildQuery)) {
            return back()->with('error', 'Incorrect Email or Password!');
        }

        Session::put('email', $buildQuery['email']);

        return redirect()->intended(route('Shorten'));
    }

    public function logout() {
        Session::forget('email');
        return redirect()->intended(route('Login'));
    }

}
