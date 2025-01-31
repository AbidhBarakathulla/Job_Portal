<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:250',
            'email' => 'required|string|max:250|unique:candidates',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $register=Candidate::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);
        
        return redirect()->route('home',compact('register'))
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        $user=$request->email;

        if ($credentials) {
            return redirect()->route('home')->with('user', Auth::user()); ;
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function home()
    {
        return view('auth.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }
}
