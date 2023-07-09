<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Controllers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function index()
    {
         $admin = Admin::paginate(5); 
         return view('admin.index',compact('admin'));       
        // return view("provider.index", compact("providers"));  
    }

     //ฟังก์ชั่นรับค่าข้อมูลพนักงานส่งถูกส่งมาจากแบบฟอร์ม
     public function store(Request $request)
{
    // ตรวจสอบข้อมูล
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
    ]);

    // บันทึกข้อมูล
    $user = new Admin;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('admin');
}


    public function destroy($id){
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $admin->delete();
        return redirect()->back();
    }

    public function show(){
        return view('auth.register');
    }


}