<?php

namespace App\Http\Controllers;

use App\Models\BookingDetails;
use Illuminate\Http\Request;

class BookingDetailsController extends Controller
{
    /**
     * Retrieves all the booking details.
     *
     * @return BookingDetails[] Array of all booking details.
     */
    public function index(){
        $bookings = BookingDetails::all();

        return $bookings;
    }

    /**
     * Retrieves a booking details by its ID.
     *
     * @param string $id The ID of the booking.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the booking is not found.
     * @return \App\Models\BookingDetails The booking details.
     */
    public function show(string $id){
        $booking = BookingDetails::findOrFail($id);

        return $booking;
    }
}
