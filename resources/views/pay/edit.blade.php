<x-app-layout>
    
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class ="card">
                    <div class="card">
                        <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        <div class="card-body">
                            <form action="{{url('/pay/update/'.$pays->payID)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">รูปภาพสลิปเงิน</th>
                                                <th scope="col">จำนวนเงิน</th>
                                                <th scope="col">หมายเหตุ</th>
                                                <th scope="col">สถานะ #1 = กำลังตรวจสอบ 2 =ชำระเงิน</tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="{{asset($pays->slipFile)}}" alt="" width="300" height="400">

                                                </td>
                                                <td>{{ $request->price }}</td>
                                                "asdasd"
                                                <td>
                                                    <input type="text" class="form-control" name="comment" value="{{$pays->comment}}"> 
                                                </td>
                                             
                                                <td>
                                                    <input type="text" class="form-control" name="statusID" value="{{$request->statusID}}"> 
                                                </td>
                                                <td>
                                                    <input type="submit" value="ยืนยัน" class="btn btn-success">
                                                </td>
                                            </form>
                                                <!-- <td>
                                                    <input type="submit" value="ชำระเงินแล้ว" class="btn btn-success">
                                                </td> -->
                                               
                                            </tr>
                                        </tbody>
                                </div>    
                        </div>
                    </div>  
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
