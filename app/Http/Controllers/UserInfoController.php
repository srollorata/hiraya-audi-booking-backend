<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    
    /**
     * Retrieves all users from the database.
     *
     * @return Collection A collection of UserInfo objects representing all users.
     */
    public function index(){
        $users = UserInfo::all();

        return $users;
    }

    
    /**
     * Display a specific user information.
     *
     * @param string $id The ID of the user.
     * @return UserInfo The user information.
     */
    public function show(string $id){
        $users = UserInfo::findOrFail($id);

        return $users;
    }


    public function update(UserInfoRequest $request, string $id){
        $users = UserInfo::findOrFail($id);
        $validated = $request->validated();

        $users->update($validated);


        return $users;
    }
}
