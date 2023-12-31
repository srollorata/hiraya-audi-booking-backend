<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bookings::all();
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
    public function store(BookingRequest $request)
    {
        //
        $validated = $request->validated();

        $bookings = Bookings::create($validated);

        return $bookings;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Bookings::findOrFail($id);
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
    public function update(BookingRequest $request, string $id)
    {
        //
        $validated = $request->validated();
        $bookings = Bookings::findOrFail($id);

        $bookings->update($validated);
        
        return $bookings;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bookings = Bookings::findOrFail($id);
        $bookings->delete();

        return $bookings;
    }

    public function status(BookingRequest $request, string $id){
        
        $bookings = Bookings::findOrFail($id);
        $validated = $request->validated();
        $bookings->status = $validated['status'];

        $bookings->save();

        return $bookings;
    }

    /**
     * Stores the form data in the "booking" and "clients" tables.
     *
     * @param Request $request The request object containing the form data.
     * @throws None
     * @return array An array containing the stored form data and a success message.
     */
    public function storeFormData(Request $request){
    // Get the form data from the request
    $formData = $request->all();
    
    // Store the form data in the "booking" table
    $bookingData = [
        'date' => $formData['date'],
        'time' => $formData['time'],
        'status' => $formData['status'],
        'purpose' => $formData['purpose'],
        'user_id' => $formData['user_id'],
        // Add more fields as needed
    ];

    // Identify the client based on the given email
    $client = DB::table('clients')->where('email', $formData['email'])->first();

    if ($client) {
        // If client is found, use the client ID
        $bookingData['client_id'] = $client->id;
    } else {
        // If no client is found, create a new client
        $newClient = [
            'first_name' => $formData['first_name'],
            'last_name' => $formData['last_name'],
            'contact_number' => $formData['contact_number'],
            'email' => $formData['email'],
            'affiliation_id' => $formData['affiliation_id'],
            // Add more fields as needed
        ];
        
        $createdClient = DB::table('clients')->insertGetId($newClient);
        
        $bookingData['client_id'] = $createdClient;
    }

    // Store the booking data in the "bookings" table
    DB::table('bookings')->insert($bookingData);

    $response = [
        'bookingData' => $bookingData,
        'message' => 'Form data stored successfully',
    ];
    
    // Return a response indicating success
    return $response;
    }
}
