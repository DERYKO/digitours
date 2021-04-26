<?php

namespace App\Http\Controllers\Api;

use App\Data\Models\Wallet;
use App\Http\Controllers\Controller;
use App\Jobs\SendSmsMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function mobileLogin(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required']
        ]);
        $user = User::where('phone', $request->phone)
            ->first(['id', 'name', 'email', 'password', 'phone', 'preferred_notification_channel']);
        $code = rand(1000, 9999);
        if ($user) {
            User::where('phone', $request->phone)->update([
                'code' => $code
            ]);
            dispatch(new SendSmsMessage($request->phone, "Your code is $code kindly use it to login"));
            return response()->json(['user' => User::where('phone', $request->phone)
                ->first(['id', 'name', 'code','phone', 'email']), 'status' => 'existing']);
        } else {
            $new = User::create([
                'phone' => $request->phone,
                'code' => $code,
                'password' => Hash::make($request->phone)
            ]);
            return response()->json(['user' => User::where('id', $new->id)->first(['id', 'name', 'code','phone', 'email']), 'status' => 'new']);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

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
