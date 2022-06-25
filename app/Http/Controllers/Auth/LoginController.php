<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Helpers\ApiConstants;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    /**
     * Display login view.
     *
     * @return \Illuminste\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * login user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), ApiConstants::VALIDATION_ERR_CODE);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['errors' => 'Unauthorized'], ApiConstants::AUTH_ERR_CODE);
        }

        $message = "Login Successful";
        $data = [
            "user" => auth()->user(),
            "access_token" => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl')
        ];

        $data;
        return redirect()->intended(RouteServiceProvider::HOME);
        // return validResponse($message, $data);
    }

    /**
     * Get user profile.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        $message = "User Profile Fetched";
        $data = auth()->user();

        return validResponse($message, $data);
    }
}
