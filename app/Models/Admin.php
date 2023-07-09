<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory;
    protected $table = "users";
    // protected $table = "provider";
    protected $primaryKey = "id";
    // public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password'

    ];

}
