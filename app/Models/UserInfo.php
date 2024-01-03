<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_info';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'avatar',
        'about',
        'company',
        'job',
        'country',
        'address',
        'phone',
    ];
    
}
