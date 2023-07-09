<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function delete(Request $request){
        $custID = $request ->get('custID');
      
        $sql = "DELETE FROM customer WHERE custID ='$custID'";
        
        DB::delete($sql);

        return response() -> json(
            array('message'=>'ลบเรียบร้อย',
            'status'=>'true'));
    }

    public function update(Request $request){
        $username = $request->get('userName');
        $password = $request->get('password');
        $firstName = $request ->get('firstName');
        $lastName = $request ->get('lastName');
        $custID = $request ->get('custID');
        $email = $request ->get('email');
        $mobilePhone = $request ->get('mobilePhone');
        $subdistrictID = $request ->get('subdistrictID');
        $address = $request ->get('address');
        $this->validate($request, [
            'file' => 'image' //works for jpeg, png, bmp, gif, or svg
        ]);
        $file = $request->file('imagefile');       

        if(isset($file)){
            $imagefile = time().$file->getClientOriginalName();
            $file->move('assets/customer', $imagefile);    
            
            $sql = "UPDATE customer
            SET userName = '$username', password= '$password', firstName= '$firstName', lastName= '$lastName', 
                email = '$email', mobilePhone= '$mobilePhone',subdistrictID='$subdistrictID', imagefile='$imagefile', address='$address'
            WHERE custID = '$custID'";
        }else{
            $sql = "UPDATE customer
            SET userName = '$username', password= '$password', firstName= '$firstName', lastName= '$lastName', 
                email = '$email', mobilePhone= '$mobilePhone',subdistrictID='$subdistrictID' , address='$address'
            WHERE custID = '$custID'";
        }              
        
        DB::update($sql);

        return response() -> json(
            array('message'=>'อัปเดตเรียบร้อย',
            'status'=>'true'));
    }

    public function register(Request $request){
        $username = $request->get('userName');
        $password = $request->get('password');
        $firstName = $request ->get('firstName');
        $lastName = $request ->get('lastName');
        $email = $request ->get('email');
        $mobilePhone = $request ->get('mobilePhone');
      
        $sql = "INSERT INTO customer (userName, password, firstName, lastName, email, mobilePhone)
        VALUES ('$username', '$password', '$firstName', '$lastName', '$email', '$mobilePhone')";
        
        DB::insert($sql);

        return response() -> json(
            array('message'=>'ลงทะเบียนเรียบร้อย',
            'status'=>'true'));
    }

    public function login(Request $request){
        
        $username = $request->get('userName');
        $password = $request->get('password');

        $sql = "SELECT * FROM customer WHERE (userName='$username') AND 
                password = '$password' ";
        //echo $sql;die();
        $users=DB::select($sql);

        if($users){
            $user = (array)$users[0];
            $user['message'] = 'success';
            $user['status'] = 'true';
        }else{
            $user = array();
            $user['message'] = 'this user is not found.';
            $user['status'] = 'false';          
            // $user = array('message' => 'this user is not found.',
            //         'status'=>'false');
        }
        return response()->json($user);
        
    }


    public function province(){
        $sql = "SELECT * FROM `province`";
        $province=DB::select($sql);
        return response()->json($province);

    }

    public function district($id){
        $sql = "SELECT * FROM `district` WHERE `provinceID`='$id';";
        $district=DB::select($sql);
        return response()->json($district);

    }

    public function subdistrict($id){
        $sql = "SELECT * FROM `subdistrict` WHERE `districtID`='$id';";
        $subdistrict=DB::select($sql);
        return response()->json($subdistrict);

    }
    public function profile($id){
        

        $sql = "SELECT customer.* , province.provinceName, district.districtName,subdistrict.subdistrictName,
        province.provinceName,province.provinceID,district.districtID 
        FROM customer
        LEFT JOIN subdistrict ON subdistrict.subdistrictID =customer.subdistrictID
        LEFT JOIN district ON district.districtID = subdistrict.districtID
        LEFT JOIN province ON province.provinceID = district.provinceID
        where custID = $id";
        $users=DB::select($sql);

        if($users){
            $user = (array)$users[0];
            $user['message'] = 'success';
            $user['status'] = 'true';
        }else{
            $user = array();
            $user['message'] = 'this user is not found.';
            $user['status'] = 'false';          
            // $user = array('message' => 'this user is not found.',
            //         'status'=>'false');
        }
        return response()->json($user);
        
    }

}
