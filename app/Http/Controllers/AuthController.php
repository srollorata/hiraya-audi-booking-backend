<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //

    /**
     * Authenticates a user and generates a token.
     *
     * @param UserRequest $request The user request object containing the username and password.
     * @throws ValidationException If the provided credentials are incorrect.
     * @return array The authenticated user and the generated token.
     */
    public function login(UserRequest $request){

        $user = User::where('username', $request->username)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        // Create a new connection configuration
        $config = app('config');
        $connections = $config->get('database.connections');
        $newConnection = $connections[$config->get('database.default')];
        $newConnection['database'] = 'hiraya_simplified-backend';
        $newConnection['username'] = $request->username;
        $newConnection['password'] = $request->password;

        // Set the new connection configuration
        $config->set('database.connections.' .$request->username, $newConnection);

        // Reconnect to the new database
        DB::purge($request->username);
        DB::reconnect($request->username);
        Config::set('database.default', $request->username);

        $response = [
            'user' => $user,
            'token' => $user->createToken($request->username)->plainTextToken,
            'message' => 'Logged in successfully, and Switched database connection '
        ];

        

        return $response;
    }


    /**
     * Logout the user and delete all their tokens.
     *
     * @param Request $request The request object.
     * @return array The response message.
     */
    public function logout(Request $request){

        $request->user()->tokens()->delete();

        $response = [
            'message' => 'Logged out successfully'
        ];
        
        return $response;
    }
}
