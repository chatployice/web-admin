<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    public function index(){
        // $provider = Provider::paginate(5);
        $provider= DB::table('providers')->paginate(5);
        // $provider = Provider::all();
        return view('provider.index',compact('provider'));
    }
    
    //ฟังก์ชั่นรับค่าข้อมูลพนักงานส่งถูกส่งมาจากแบบฟอร์ม
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate([
            // 'providerID'=> 'required',
            'firstName'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'phon'=>'required|max:10'
        ]);
        //บันทึกข้อมูล
        $data = array();
        $data["firstName"]=$request->firstName;
        $data["last_name"]=$request->last_name;
        $data["address"]=$request->address;
        $data["email"]=$request->email;
        $data["phon"]=$request->phon;
        //query builder
        DB::table('providers')->insert($data);
        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");


        // $provider = new Provider;
        // // $provider->providerID = Auth::user()->providerID;
        // $provider->firstName = $request->firstName;
        // $provider->last_name = $request->last_name;
        // $provider->address = $request->address;
        // $provider->email = $request->email;
        // $provider->phon = $request->phon;
        // $provider->save();
        // return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");
    }

        
    public function edit($providerID) {
        //เช็คค่าว่า$providerIDส่งเป็นอะไร
        // dd($providerID);
        $provider = Provider::find($providerID);
        // dd($provider->firstName);
        return view('provider.edit', compact('provider'));
    }

    public function update(Request $request, $providerID){
        //  dd($providerID,$request->firstName);
        $request->validate([
            'firstName' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phon' => 'required|max:10'
        ]);

        $update = Provider::find($providerID)->update([
            'firstName'=>$request->firstName,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'email'=>$request->email,
            'phon'=>$request->phon
        ]);
        return redirect()-> route('provider')->with('success', 'อัพเดตข้อมูลเรียบร้อย');
    }



    public function destroy($providerID){
        $provider = Provider::find($providerID);
        if (!$provider) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $provider->delete();
        return redirect()->back();
    }

}
