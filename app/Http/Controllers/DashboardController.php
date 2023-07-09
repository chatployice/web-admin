<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //จำนวนการขอใช้บริการ
        $sql="SELECT COUNT(*) AS requestCount FROM request";
        $result = DB::select($sql);
        $requestCount = $result[0]->requestCount;

        //จำนวนลูกค้า
        $sql="SELECT COUNT(*) AS customerCount FROM customer";
        $result = DB::select($sql);
        $customerCount = $result[0]->customerCount;

        //จำนวนพนักงานทำความสะอาด
        $sql="SELECT COUNT(*) AS providerCount FROM `provider` ";
        $result = DB::select($sql);
        $providerCount = $result[0]->providerCount;

            //"กำลังจอง", "รอตรวจสอบ", "ชำระเงินแล้ว"
            // 012

        //นับจำนวนสถานะกำลังจอง 0
        $sql="SELECT COUNT(*) AS status0Count FROM `request` WHERE `statusID` = 0; ";
        $result = DB::select($sql);
        $status0Count = $result[0]->status0Count;

        //นับจำนวนสถานะรอตรวจสอบ 1
        $sql="SELECT COUNT(*) AS status1Count FROM `request` WHERE `statusID` = 1; ";
        $result = DB::select($sql);
        $status1Count = $result[0]->status1Count;
        
        //นับจำนวนสถานะรอตรวจสอบ 2
        $sql="SELECT COUNT(*) AS status2Count FROM `request` WHERE `statusID` = 2; ";
        $result = DB::select($sql);
        $status2Count = $result[0]->status2Count;

        // //ราคา
        // $sql="SELECT price AS priceTotal FROM request";
        // $result = DB::select($sql);
        // $priceTotal = $result[0]->priceTotal;

        
        // //นับวัน
        // $sql="  SELECT dateStart ,COUNT(*) AS countDate
        //         FROM request 
        //         GROUP BY dateStart
        //         ORDER BY dateStart DESC ";
        // $result = DB::select($sql);
        // $countDate = $result[0]->countDate;

        // ข้อมูลตาราง
        // $sql = "SELECT `requestID`,`dateStart`,`price` FROM `request` ORDER BY `requestID`";
        // $result = DB::select($sql);
        // $data = array();
        // foreach ($result as $row) {
        // $data[] = $row;
        // }
        // mysqli_close($conn);
        // echo json_encode($data)
        

        return view("dashboard", compact("requestCount","customerCount","providerCount"
        ,"status0Count","status1Count","status2Count",));
    }

    
    // public function show()
    // {
    //     return view("show", compact("show"));
    // }


}
