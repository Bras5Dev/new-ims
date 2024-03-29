<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends BaseApiController
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $password = $request['password'];

            $user = User::where('email', $request['email'])
                ->first();

            if (!$user || !Hash::check($password, $user->password)) {
                Log::info('User failed to login.', ['email' => $request['email'], 'id' => $user->id ?? 'N/A']);
                return response()->json(['message' => 'Your email or password does not match'], 422);
            }

            if ($user->status == "disabled") {
                return response()->json(['message' => 'Account Disabled'], 401);
            }

            if (!Auth::attempt(['email' => $user->email, 'password' => $password])) {
                return response()->json(['message' => 'Authentication failed'], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            // Get the token expiration time
            $tokenExpiration = now()->addMinutes(config('sanctum.expiration'));

            $role = $user->roles()->pluck('name')->first();
            // $perms = $role->permissions()->pluck('name')->all();

            return $this->sendResponse([
                'user' => $user,
                'token' => $token,
                'token_expiration' => $tokenExpiration, // Include token expiration time
                'role' => $role,
                // 'perms' => $perms,
            ], 'User logged in successfully');
        } catch (Exception $e) {
            return $this->sendError('Something went wrong on the server side. Please report this error to MAU');
        }
    }
}
