<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Request extends Model
{
    use HasFactory;
    protected $table = "request";
    protected $primaryKey = "requestID";

    public function pay()
    {
        return $this->hasOne(Pay::class, 'requestID');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'custID');
    }
}
