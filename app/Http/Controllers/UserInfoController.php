<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;

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
}
