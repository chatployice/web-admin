<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;
    protected $table = "pay";
    // protected $table = "provider";
    protected $primaryKey = "payID";
    // public $timestamps = false;
    protected $fillable = [
        'requestID',
        'datePay',
        'slipFile',
        'comment'
    ];

    public function request()
    {
        return $this->belongsTo(Request::class, 'requestID');
    }



}
