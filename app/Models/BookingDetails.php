<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    use HasFactory;

    protected $table = 'booking_details';
    protected $primaryKey = 'booking_id';
}
