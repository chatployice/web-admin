<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requests;
use DB;


class RequestController extends Controller
{

    public function request(Request $request){
        $custID = $request->get('custID');
        //$dateStart = $request->get('dateStart');
        $hour = $request ->get('hour');
        $pet = $request ->get('pet');
        $price = $request ->get('price');
        $address = $request ->get('address');
        $subdistrictID = $request ->get('subdistrictID');
        
        //เพิ่มข้อมูลลงในตาราง request
        // $sql = "INSERT INTO request(custID, hour, pet, price, address, subdistrictID) VALUES 
        //         ($custID,$hour,'$pet',$price,'$address','$subdistrictID')";        
        // DB::insert($sql);
        $req = new Requests();
        $req->custID = $custID;
        $req->hour = $hour;
        $req->pet = $pet;
        $req->price = $price;
        $req->address = $address;
        $req->subdistrictID = $subdistrictID;
        $req->save();

        //เพิ่มข้อมูลขอใช้บริการหลักลงในตาราง requestdetail
        $requestID = $req->requestID;     
        $serviceDetailIDMain =  $request ->get('serviceDetailIDMain');
        $amount =  $request ->get('amount');            
        $sql = "INSERT INTO requestdetail(requestID, serviceDetailID, amount) VALUES ($requestID,$serviceDetailIDMain, $amount)";        
        DB::insert($sql);

        //เพิ่มข้อมูลขอใช้บริการเสริมลงในตาราง requestdetail
        $serviceDetailID1 =  $request ->get('serviceDetailID1');
        $serviceDetailID2 =  $request ->get('serviceDetailID2');
        $serviceDetailID3 =  $request ->get('serviceDetailID3');
        // $serviceDetailID10 =  $request ->get('serviceDetailID10');

        if($serviceDetailID1!=""){
            $sql = "INSERT INTO requestdetail(requestID, serviceDetailID, amount) VALUES ($requestID,$serviceDetailID1, $amount)";        
            DB::insert($sql);            
        }

        if($serviceDetailID2!=""){
            $sql = "INSERT INTO requestdetail(requestID, serviceDetailID, amount) VALUES ($requestID,$serviceDetailID2, $amount)";        
            DB::insert($sql);            
        }

        if($serviceDetailID3!=""){
            $sql = "INSERT INTO requestdetail(requestID, serviceDetailID, amount) VALUES ($requestID,$serviceDetailID3, $amount)";        
            DB::insert($sql);            
        }

        // if($serviceDetailID10!=""){
        //     $sql = "INSERT INTO requestdetail(requestID, serviceDetailID, amount) VALUES ($requestID,$serviceDetailID10, $amount)";        
        //     DB::insert($sql);            
        // }

        return response() -> json(
            array('message'=>'บันทึกข้อมูลเรียบร้อย',
            'status'=>'true'));
    }


    public function requestupdate(Request $request){
        $dateStart = $request->get('dateStart');
        $timeStart = $request->get('timeStart');
        $note = $request ->get('note');
        $custID = $request ->get('custID');
        
      
        $sql = "UPDATE request
        SET dateStart = '$dateStart', timeStart= '$timeStart', note = '$note'
        WHERE custID=$custID  AND statusID=0";
        // echo $sql;die();        
        DB::update($sql);

        $sql = "SELECT requestID FROM request WHERE custID=$custID  AND statusID=0";             
        $result = DB::select($sql)[0];        


        return response() -> json(
            array('requestID'=> $result->requestID,
            'message'=>'อัปเดตเรียบร้อย',
            'status'=>'true'));
    }

    public function requestlist($id){
    
        $sql = "SELECT request.requestID, dateStart, timeStart,request.hour,  request.price, statusID ,serviceName,comment
        FROM request
        INNER JOIN requestdetail ON request.requestID =requestdetail.requestID
        INNER JOIN servicedetail ON requestdetail.serviceDetailID = servicedetail.serviceDetailID
        INNER JOIN service ON servicedetail.serviceID = service.serviceID
        INNER JOIN pay ON request.requestID = pay.requestID
        where custID = $id
        GROUP BY request.requestID, dateStart, timeStart,request.hour,  request.price, statusID ,serviceName,comment 
        order by pay.requestID DESC,pay.payID DESC";

        $request=DB::select($sql);

        return response()->json($request);
        
    }

    public function requestcurrent($id){
    
        $sql = "SELECT request.requestID, dateStart, timeStart,request.hour,  request.price ,serviceName
        FROM request
        LEFT JOIN requestdetail ON request.requestID =requestdetail.requestID
        INNER JOIN servicedetail ON requestdetail.serviceDetailID = servicedetail.serviceDetailID
        INNER JOIN service ON servicedetail.serviceID = service.serviceID
        WHERE custID = $id AND statusID=1
        ORDER BY request.requestID DESC";

        $result=DB::select($sql);

        if(count($result)>0){
            return response()->json($result[0]);
        }else{
            return response() -> json(
                array('message'=>'fail','status'=>'false'));          
        }

        
        
    }

}