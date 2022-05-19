<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserRequset;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequset $request)
    {

        $validated = $request->validated();
        User::creating(function ($user) {
            $user->password = bcrypt($user->password);
        });

        $user = User::create($validated);

        return response()->json([
            'massage' => 'user created successfully',
            'data' => new UserResource($user),
            'token' => $user->createToken('MyApp')->plainTextToken,
        ], 201);
    }

    public function login(Request $request)
    {

        $validated = $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            return response()->json([
                'massage' => 'user not found',

            ], 404);
        }

        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'massage' => 'user is incorrect',
            ], 401);
        }

        return response()->json([
            'massage' => 'user created successfully',
            'data' => new UserResource($user),
            'token' => $user->createToken('MyApp')->plainTextToken,
        ], 200);
    }
}
