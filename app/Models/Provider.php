<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    // protected $table = "providers";
    protected $primaryKey = "providerID";
    protected $fillable = [
        'providerID',
        'firstName',
        'last_name',
        'address',
        'email',
        'phon',
        
    ];
}
