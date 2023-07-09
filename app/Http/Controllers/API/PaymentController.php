<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        //payment
        $this->validate($request, [
            'file' => 'image' //works for jpeg, png, bmp, gif, or svg
        ]);

        $file = $request->file('slipFile');        
        if(isset($file)){
            $slipFile = time().$file->getClientOriginalName();
            $file->move('assets/payment', $slipFile);            
        }else{
            $slipFile = "";
        }
        $requestID = $request->get('requestID');
        $datePay = date("Y-m-d H:i:s");
       
        $sql = "INSERT INTO pay(requestID,datePay,slipFile) 
                VALUES($requestID, '$datePay', '$slipFile')";
        DB::insert($sql);

        //update payment status
        $sql = "UPDATE request SET statusID = 1 WHERE requestID = $requestID ";
        DB::update($sql);        

        return response()->json(array(
            'message' => 'success', 
            'status' => 'true'));
    }
}


