<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requests;
use DB;


class ProviderprofileController extends Controller
{

    public function deleteprovider(Request $request){
        $custID = $request ->get('providerID');
      
        $sql = "DELETE FROM provider WHERE providerID = '$custID'";
        
        DB::delete($sql);

        return response() -> json(
            array('message'=>'ลบเรียบร้อย',
            'status'=>'true'));
    }

    public function updateprovider(Request $request){
        $username = $request->get('userName');
        $password = $request->get('password');
        $firstName = $request ->get('firstName');
        $lastName = $request ->get('lastName');
        $custID = $request ->get('providerID');
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
            $file->move('assets/provider', $imagefile);    
            
            $sql = "UPDATE provider
            SET userName = '$username', password= '$password', firstName= '$firstName', lastName= '$lastName', 
                email = '$email', mobilePhone= '$mobilePhone',subdistrictID='$subdistrictID', imagefile='$imagefile', address= '$address'
            WHERE providerID  = '$custID'";
        }else{
            $sql = "UPDATE provider
            SET userName = '$username', password= '$password', firstName= '$firstName', lastName= '$lastName', 
                email = '$email', mobilePhone= '$mobilePhone',subdistrictID='$subdistrictID' ,address= '$address'
            WHERE providerID  = '$custID'";
        }              
        
        DB::update($sql);

        return response() -> json(
            array('message'=>'อัปเดตเรียบร้อย',
            'status'=>'true'));
    }

    public function loginprovider(Request $request){
        
        $username = $request->get('userName');
        $password = $request->get('password');

        $sql = "SELECT * FROM provider WHERE (userName='$username') AND 
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


    public function provinceProvider(){
        $sql = "SELECT * FROM `province`";
        $province=DB::select($sql);
        return response()->json($province);

    }

    public function districtProvider($id){
        $sql = "SELECT * FROM `district` WHERE `provinceID`='$id';";
        $district=DB::select($sql);
        return response()->json($district);

    }

    public function subdistrictProvider($id){
        $sql = "SELECT * FROM `subdistrict` WHERE `districtID`='$id';";
        $subdistrict=DB::select($sql);
        return response()->json($subdistrict);

    }

    public function profileProvider($id){
        

        $sql = "SELECT provider.* , province.provinceName, district.districtName,subdistrict.subdistrictName,
        province.provinceName,province.provinceID,district.districtID 
        FROM provider
        LEFT JOIN subdistrict ON subdistrict.subdistrictID =provider.subdistrictID
        LEFT JOIN district ON district.districtID = subdistrict.districtID
        LEFT JOIN province ON province.provinceID = district.provinceID
        where providerID = $id";
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