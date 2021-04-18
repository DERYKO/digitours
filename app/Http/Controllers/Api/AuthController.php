<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (auth()->attempt($credentials)) {
                $token = auth()->user()->createToken('digitours@ke')->accessToken;
                return response()->json(['token' => $token, 'user' => auth()->user()], 200);
            }
           return response()->json(['message' => 'Invalid credentials'], 404);
        }
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'Successfully logged out',
        ], 204);
    }

    /**
     * @param Request $request
     */
    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'exists:users,email']
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Email is not in our records'], 404);
        } else {
            Password::sendResetLink($request->all());
        }
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json(['message' => trans($response)], 200);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => $response->message, 'errors' => $response->errors], $response->status_code);
    }
}
