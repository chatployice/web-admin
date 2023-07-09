<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = "request";
    protected $primaryKey = "requestID";
    public $timestamps = false;

    //protected $fillable = ['custID', 'orderDate', 'shipDate', 'receiveDate', 'statusID'];

}
