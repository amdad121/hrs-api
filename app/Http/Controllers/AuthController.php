<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function register(Request $request): array
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        // event(new Registered($user));

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return string
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:32',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('token')->plainTextToken;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function user(Request $request)
    {
        return $request->user();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return string[]
     */
    public function logout(Request $request): array
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are successfully logged out.',
        ];
    }
}
