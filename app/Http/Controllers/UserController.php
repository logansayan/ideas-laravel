<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    // SHOW REGISTER FORM
    public function register() {
        return view("users.register");
    }

    // STORE REGISTER INFO
    public function store(Request $request) {
        $formFields = $request->validate([
            "username" => ["required", Rule::unique("users", "username")],
            "email" => ["required", Rule::unique("users", "email"), "email"],
            "password" => "required|min:6|confirmed"
        ]);

        // Hash password
        $formFields["password"] = bcrypt($formFields["password"]);
        
        // Store info
        $user = User::create($formFields);

        // Login user
        auth()->login($user);

        // #F24236 red color

        // Redirect to index page
        return redirect("/")
            ->with("message", "Registration successful!")
            ->with("bgColor", "var(--success)");
    }

    // SHOW LOGIN FORM
    public function login() {
        return view("users.login");
    }

    // CHECK LOGIN CREDENTIALS
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (auth()->attempt($formFields)) {
            
            $request->session()->regenerate();
            return redirect("/")
                ->with("message", "You are logged in!")
                ->with("bgColor", "var(--success)");
        }

        return back()->withErrors(["username" => "Incorrect credentials"])->onlyInput("username");
    }

    // LOGOUT USER
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect(route("users.login"))
            ->with("message", "You are logged out!")
            ->with("bgColor", "var(--warning)");
    }

    // public function test() {
    //     return redirect("/")
    //         ->with("message","Profile updated successfully")
    //         ->with("bgColor", "");
    // }

}
