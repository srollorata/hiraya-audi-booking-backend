<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCredentialsRequest;
use App\Models\UserCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Logs in a user with the provided credentials.
     *
     * @param UserCredentialsRequest $request The request object containing the user's credentials.
     * @throws ValidationException if the provided credentials are incorrect.
     * @return array The user's credentials and a token.
     */
    //
    public function login(UserCredentialsRequest $request){
        $user = UserCredentials::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'usercredentials' => $user,
            'token' => $user->createToken($request->email)->plainTextToken
        ];

        return $response;
    }
    
    public function logout(Request $request){
        
        $request->user;
    }
}
