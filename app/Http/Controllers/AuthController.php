<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use App\Notifications\AccountVerifiy;

class AuthController extends Controller
{
    //Auth controller for api

     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth:api', ['except' => ['login','register']]);
        // Middleware for check If code is Matched or Not
        $this->middleware('checkcode', ['only' => ['login']]);
    }

  /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|string|between:2,100',
            'mobile' => 'required|max:20|unique:users',
            'password' => 'required|min:3',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }




                $VeryfyUser = new User();
                $VeryfyUser->username = $request->username;
                $VeryfyUser->mobile = $request->mobile;
                $VeryfyUser->password= bcrypt($request->password);
                $VeryfyUser->code = Str::random(4);
                $VeryfyUser->notify(new AccountVerifiy($VeryfyUser));
                $VeryfyUser->save();



        return response()->json([
            'message' => 'We send code to  Number '. $VeryfyUser->mobile .' to Verify, please check that',
        ], 201);
    }




    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required|min:3',
            'code' => "required"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
