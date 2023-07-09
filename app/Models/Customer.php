<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    // protected $table = "provider";
    // protected $fillable = ['firstName'];
    protected $primaryKey = "custID";
    public $timestamps = false;

    protected $fillable = [
        'custID',
        'firstName',
        'lastName',
        'address',
        'email',
        'mobilePhone',  

    ];
    
    public function request()
    {
        return $this->belongsTo(Request::class, 'custID');
    }
    
}
