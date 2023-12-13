<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCredentials;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCredentialsRequest;

class UserCredentialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserCredentials::all();
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
    public function store(Request $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = UserCredentials::create($validated);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserCredentials::findOrFail($id);
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

    /**
     * Update the username of a user.
     *
     * @param UserCredentialsRequest $request The request object containing the user credentials.
     * @param string $id The ID of the user.
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException If the user with the given ID is not found.
     * @return UserCredentials The updated user credentials object.
     */
    public function updateUsername(UserCredentialsRequest $request, string $id)
    {
        $user = UserCredentials::findOrFail($id);
        $validated = $request->validated();
        $user->username = $validated['username'];

        $user->save();

        return $user;
    }

    /**
     * Updates the email address of a user.
     *
     * @param UserCredentialsRequest $request The request object containing the updated email.
     * @param string $id The ID of the user to update.
     * @throws ModelNotFoundException If the user with the given ID is not found.
     * @return UserCredentials The updated user object.
     */
    public function updateEmail(UserCredentialsRequest $request, string $id)
    {
        $user = UserCredentials::findOrFail($id);
        $validated = $request->validated();
        $user->email = $validated['email'];

        $user->save();

        return $user;
    }


    /**
     * Updates the password of a user.
     *
     * @param UserCredentialsRequest $request the request object containing the user credentials
     * @param string $id the ID of the user
     * @throws ModelNotFoundException if the user does not exist
     * @return UserCredentials the updated user object
     */
    public function updatePassword(UserCredentialsRequest $request, string $id)
    {
        $user = UserCredentials::findOrFail($id);
        $validated = $request->validated();
        $user->password = $validated['password'];

        $user->save();

        return $user;
    }


    /**
     * Updates the contact information of a user.
     *
     * @param UserCredentialsRequest $request The user credentials request object.
     * @param string $id The ID of the user to update.
     * @throws ModelNotFoundException If the user with the given ID is not found.
     * @return UserCredentials The updated user credentials.
     */
    public function updateContact(UserCredentialsRequest $request, string $id)
    {
        $user = UserCredentials::findOrFail($id);
        $validated = $request->validated();
        $user->contact_no = $validated['contact_no'];

        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = UserCredentials::findOrFail($id);
        $user->delete();

        return $user;
    }
}
