<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function name(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->name = $validated['name'];

        $user->save();

        return $user;
    }

    /**
     * Updates the email address of a user.
     *
     * @param UserRequest $request The user request object.
     * @param string $id The ID of the user.
     * @return User The updated user object.
     */
    public function email(UserRequest $request, string $id){
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->email = $validated['email'];
        
        $user->save();

        return $user;
    }

    /**
     * Updates the username of a user.
     *
     * @param UserRequest $request The request object containing the validated data.
     * @param string $id The ID of the user to update.
     * @throws ModelNotFoundException If the user with the given ID is not found.
     * @return User The updated user object.
     */
    public function username(UserRequest $request, string $id){
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->username = $validated['username'];
        
        $user->save();

        return $user;
    }

    /**
     * Updates the password for the specified user.
     *
     * @param UserRequest $request The request object containing the new password.
     * @param string $id The ID of the user.
     * @throws ModelNotFoundException If the user with the specified ID is not found.
     * @return User The updated user object.
     */
    public function password(UserRequest $request, string $id){
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->password = $validated['password'];
        
        $user->save();

        return $user;
    }

    public function admin(UserRequest $request, string $id){
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->is_admin = $validated['is_admin'];
        
        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }


    /**
     * Handle the avatar upload for a user.
     *
     * @param UserRequest $request The request object containing the uploaded avatar.
     * @param string $id The ID of the user.
     * @throws ModelNotFoundException If the user with the given ID is not found.
     * @return User The updated user object.
     */
    public function avatar(UserRequest $request, string $id){
        $user = User::findOrFail($id);
        // $validated = $request->validated();
        if (!is_null($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->avatar = $request->file('avatar')->storePublicly('images', 'public');

        $user->save();

        return $user;
    }
}
