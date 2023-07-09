<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requests;
use DB;


class ProviderController extends Controller
{

    public function requestprovider($id){
    
        $sql = "SELECT request.requestID, dateStart, timeStart,request.hour,  request.price ,serviceName
        FROM request
        LEFT JOIN requestdetail ON request.requestID =requestdetail.requestID
        INNER JOIN servicedetail ON requestdetail.serviceDetailID = servicedetail.serviceDetailID
        INNER JOIN service ON servicedetail.serviceID = service.serviceID
        WHERE  service.providertypeID =$id AND statusID = 2 AND request.providerID is null
        GROUP  BY request.requestID, dateStart, timeStart,request.hour,  request.price ,serviceName
        ORDER  BY request.requestID";
        
        $result=DB::select($sql);

        return response()->json($result[0]);
    }

    public function requestupdateProvider(Request $request){
        $providerID = $request->get('providerID');
        $requestID = $request->get('requestID');

        $sql = "UPDATE request
        SET providerID = '$providerID'
        WHERE requestID=$requestID  ";
        // echo $sql;die();        
        DB::update($sql);

       
        return response() -> json(
            array(
            'message'=>'อัปเดตเรียบร้อย',
            'status'=>'true'));
    }


    public function Providerhistory($id){
    
        $sql = "SELECT request.requestID, dateStart, timeStart,request.hour,  request.price, statusID ,serviceName,comment
        FROM request
        INNER JOIN requestdetail ON request.requestID =requestdetail.requestID
        INNER JOIN servicedetail ON requestdetail.serviceDetailID = servicedetail.serviceDetailID
        INNER JOIN service ON servicedetail.serviceID = service.serviceID
        INNER JOIN pay ON request.requestID = pay.requestID
        where providerID = $id
        GROUP BY request.requestID, dateStart, timeStart,request.hour,  request.price, statusID ,serviceName,comment 
        order by pay.requestID DESC,pay.payID DESC";

        $request=DB::select($sql);

        return response()->json($request);
        
    }

    public function ProviderList($id){
    
        $sql = "SELECT request.requestID, dateStart, timeStart,request.hour,  request.price, statusID ,serviceName,comment
        FROM request
        INNER JOIN requestdetail ON request.requestID =requestdetail.requestID
        INNER JOIN servicedetail ON requestdetail.serviceDetailID = servicedetail.serviceDetailID
        INNER JOIN service ON servicedetail.serviceID = service.serviceID
        INNER JOIN pay ON request.requestID = pay.requestID
        where providerID = $id
        GROUP BY request.requestID, dateStart, timeStart,request.hour,  request.price, statusID ,serviceName,comment 
        order by pay.requestID DESC,pay.payID DESC";

        $request=DB::select($sql);

        return response()->json($request);
        
    }
   
}