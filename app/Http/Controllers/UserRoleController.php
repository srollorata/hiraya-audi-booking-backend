<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Retrieves all user roles.
     *
     * @return UserRole[] The collection of user roles.
     */
    public function index()
    {
        $userRoles = UserRole::all();
        return $userRoles;
    }

    /**
     * Store a new user role.
     *
     * @param Request $request The HTTP request object.
     * @throws Some_Exception_Class Description of exception.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the newly created role.
     */
    public function store(Request $request){
        $role = UserRole::create($request->only(['name', 'description']));
        
        return $role; 
    }
}
