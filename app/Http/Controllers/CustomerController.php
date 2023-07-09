<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
        //  $customer = Customer::paginate(5);
        
        $customer = DB::select('SELECT * FROM customer WHERE status = 1');
        $customer = collect($customer);
        // dd($customer);  
        return view('customer.index', compact('customer'));
    }

    //ฟังก์ชั่นรับค่าข้อมูลพนักงานส่งถูกส่งมาจากแบบฟอร์ม
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate([
            // 'providerID'=> 'required',
            'firstName'=>'required',
            'lastName'=>'required',
            'address'=>'required',
            'email'=>'required',
            'phon'=>'required|max:10'
        ]);
        //บันทึกข้อมูล
        $data = array();
        $data["firstName"]=$request->firstName;
        $data["lastName"]=$request->lastName;
        $data["address"]=$request->address;
        $data["email"]=$request->email;
        $data["mobilePhone"]=$request->mobilePhone;
        //query builder
        DB::table('customer')->insert($data);
        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");

    }

      public function edit($custID) {
        //เช็คค่าว่า$providerIDส่งเป็นอะไร
        // dd($providerID);
        $customer = Customer::find($custID);
        // dd($provider->firstName);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $custID){
        // dd($custID);
        //  dd($providerID,$request->firstName);
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobilePhone' => 'required|max:10'
        ]);

        $update = Customer::find($custID)->update([
            
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'address'=>$request->address,
            'email'=>$request->email,
            'mobilePhone'=>$request->mobilePhone
        ]);
        return redirect()-> route('customer')->with('success', 'อัพเดตข้อมูลเรียบร้อย');
    }

    public function destroy($custID){
        // $customer = Customer::find($custID);
        // if (!$customer) {
        //     return response()->json(['message' => 'Customer not found'], 404);
        // }

        // $customer->delete();
        DB::update("UPDATE customer
                    SET status = 0
                    WHERE custID = $custID");
        return redirect()->back();
    }
}

