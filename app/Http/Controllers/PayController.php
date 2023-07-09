<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;

use App\Models\Pay;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PayController extends Controller
{
    // public function index()
    // {
    //      $pay = Pay::paginate(5); 
    //      return view('pay.index',compact('pay'));       
    //     // return view("provider.index", compact("providers"));  
    // }

    public function index()
    {
        $pays = Pay::all();
        $requests = ModelsRequest::all();
        return view('pay.index', compact('pays', 'requests'));
    }

    public function edit($payID) {
        //เช็คค่าว่า$IDส่งเป็นอะไร
        //  dd($payID);
        $pays = pay::find($payID);
        $requests = ModelsRequest::all();
        return view('pay.edit', compact('pays','requests'));
    }

    // public function update(Request $request,$payID){
    //     //  dd($providerID,$request->firstName);
    //     $request->validate([
    //         'comment' => 'required',
    //     ]);
    //     $update = Pay::find($payID)->update([
    //         'comment'=>$request->comment,
    //     ]);
    //     return redirect()-> route('pay')->with('success', 'อัพเดตข้อมูลเรียบร้อย');
    // }

    public function update(Request $request, $payID){
        $pay = Pay::find($payID);
        
        if (!$pay) {
            return redirect()->route('pay')->with('error', 'ไม่พบข้อมูลการชำระเงิน');
        }
        $pay->comment = $request->input('comment', ''); // ถ้าไม่มีค่า comment ให้กำหนดเป็นค่าว่าง
        $pay->save();
        $statusid = $request["statusID"];
        $test = DB::update("UPDATE request SET statusID = $statusid WHERE requestID = (SELECT requestID FROM pay WHERE payID = $payID)");
        return redirect()->route('pay')->with('success', 'อัพเดตข้อมูลเรียบร้อย');

    }

}