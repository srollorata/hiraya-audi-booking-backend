<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Bookings;
use Illuminate\Http\Request;

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
}
