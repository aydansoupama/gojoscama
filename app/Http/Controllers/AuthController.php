<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $user = User::where('code', $request->input('code'))->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->withErrors([
                'code' => 'Code de connexion invalide.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
