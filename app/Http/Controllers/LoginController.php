<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('pages.login');
    }

    public function register(Request $request)
    {
        //VALIDATION WITH LARAVEL
        $validate = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                'regex:/^[\w.+\-]+@gmail\.com$/'
            ],
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
    }
}
