<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = 'userdetails';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'about',
        'company',
        'job',
        'country',
        'address',
        'phone',
    ];
}
