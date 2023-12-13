<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredentials extends Model
{
    use HasFactory;

    protected $table = 'user_credentials';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'email',
        'password',
        'contact_no',
        'user_role_id'
    ];
}
