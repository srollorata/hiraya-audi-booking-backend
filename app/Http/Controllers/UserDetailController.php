<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailRequest;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserDetails::all();
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
    public function store(UserDetailRequest $request)
    {
        $validated = $request->validated();

        $userdetail = UserDetails::create($validated);

        return $userdetail;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserDetails::findOrFail($id);
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
     * Update the 'about' field of a user's details.
     *
     * @param UserDetailRequest $request The request object containing the validated data.
     * @param string $id The ID of the user details to be updated.
     * @throws ModelNotFoundException If the user details with the given ID cannot be found.
     * @return UserDetail The updated user details object.
     */
    public function about(UserDetailRequest $request, string $id)
    {
        $userdetail = UserDetails::findOrFail($id);
        $validated = $request->validated();

        $userdetail->about = $validated['about'];

        $userdetail->save();

        return $userdetail;
    }

/**
 * Updates the company name for a user.
 *
 * @param UserDetailRequest $request The request object containing the user details.
 * @param string $id The ID of the user.
 * @throws ModelNotFoundException If the user details are not found.
 * @return UserDetails The updated user details.
 */
    public function company(UserDetailRequest $request, string $id)
    {
        $userdetail = UserDetails::findOrFail($id);
        $validated = $request->validated();

        $userdetail->company = $validated['company'];

        $userdetail->save();

        return $userdetail;
    }

    /**
     * Updates the job of a user detail record.
     *
     * @param UserDetailRequest $request The request object containing the validated data.
     * @param string $id The ID of the user detail record to update.
     * @throws ModelNotFoundException If the user detail record with the given ID is not found.
     * @return UserDetails The updated user detail record.
     */
    public function job(UserDetailRequest $request, string $id)
    {
        $userdetail = UserDetails::findOrFail($id);
        $validated = $request->validated();

        $userdetail->job = $validated['job'];

        $userdetail->save();

        return $userdetail;
    }

    /**
     * Updates the country of a user detail.
     *
     * @param UserDetailRequest $request The user detail request object.
     * @param string $id The ID of the user detail.
     * @throws ModelNotFoundException If the user detail is not found.
     * @return UserDetails The updated user detail.
     */
    public function country(UserDetailRequest $request, string $id)
    {
        $userdetail = UserDetails::findOrFail($id);
        $validated = $request->validated();

        $userdetail->country = $validated['country'];

        $userdetail->save();

        return $userdetail;
    }


    /**
     * Updates the address of a user detail.
     *
     * @param UserDetailRequest $request The request object containing the validated data.
     * @param string $id The ID of the user detail to be updated.
     * @throws ModelNotFoundException If the user detail with the given ID is not found.
     * @return UserDetails The updated user detail.
     */
    public function address(UserDetailRequest $request, string $id)
    {
        $userdetail = UserDetails::findOrFail($id);
        $validated = $request->validated();

        $userdetail->address = $validated['address'];

        $userdetail->save();

        return $userdetail;
    }

    /**
     * Updates the phone number of a user detail.
     *
     * @param UserDetailRequest $request The request object containing the validated data.
     * @param string $id The ID of the user detail to be updated.
     * @throws ModelNotFoundException If the user detail with the given ID is not found.
     * @return UserDetails The updated user detail.
     */
    public function phone(UserDetailRequest $request, string $id)
    {
        $userdetail = UserDetails::findOrFail($id);
        $validated = $request->validated();

        $userdetail->phone = $validated['phone'];

        $userdetail->save();

        return $userdetail;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userdetail = UserDetails::findOrFail($id);
        $userdetail->delete();
        return $userdetail;
    }
}
