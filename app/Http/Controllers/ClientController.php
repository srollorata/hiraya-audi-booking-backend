<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::all();
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
    public function store(ClientRequest $request)
    {
        $validated = $request->validated();

        $client = Client::create($validated);

        return $client;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Client::findOrFail($id);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return $client;
    }

    /**
     * Updates the first name of a client.
     *
     * @param ClientRequest $request The client request object.
     * @param string $id The ID of the client.
     * @throws ModelNotFoundException If the client is not found.
     * @return Client The updated client object.
     */
    public function firstname(ClientRequest $request, string $id){

        $client = Client::findOrFail($id);
        $validated = $request->validated();

        $client->first_name = $validated['first_name'];

        $client->save();

        return $client;
    }

    /**
     * Updates the last name of a client.
     *
     * @param ClientRequest $request The request containing the updated last name.
     * @param string $id The ID of the client.
     * @throws ModelNotFoundException If the client with the given ID is not found.
     * @return Client The updated client.
     */
    public function lastname(ClientRequest $request, string $id){

        $client = Client::findOrFail($id);
        $validated = $request->validated();

        $client->last_name = $validated['last_name'];

        $client->save();

        return $client;
    }

    /**
     * Updates the contact number of a client.
     *
     * @param ClientRequest $request The client request object.
     * @param string $id The ID of the client.
     * @throws ModelNotFoundException if the client is not found.
     * @return Client The updated client object.
     */
    public function contact(ClientRequest $request, string $id){

        $client = Client::findOrFail($id);
        $validated = $request->validated();

        $client->contact_number = $validated['contact_number'];

        $client->save();

        return $client;
    }

    /**
     * Updates the email address of a client.
     *
     * @param ClientRequest $request The client request object.
     * @param string $id The ID of the client.
     * @throws ModelNotFoundException If the client is not found.
     * @return Client The updated client object.
     */
    public function email(ClientRequest $request, string $id){

        $client = Client::findOrFail($id);
        $validated = $request->validated();

        $client->email = $validated['email'];

        $client->save();

        return $client;
    }

    /**
     * Updates the affiliation ID of a client.
     *
     * @param ClientRequest $request The request object containing the validated data.
     * @param string $id The ID of the client to be updated.
     * @throws ModelNotFoundException If the client with the given ID is not found.
     * @return Client The updated client object.
     */
    public function affiliationid(ClientRequest $request, string $id){

        $client = Client::findOrFail($id);
        $validated = $request->validated();

        $client->affiliation_id = $validated['affiliation_id'];

        $client->save();

        return $client;
    }
}
