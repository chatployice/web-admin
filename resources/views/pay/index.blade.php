<!-- resources/views/pay/index.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">รหัสรายการ</th>
                                    <th scope="col">ชื่อผู้ใช้บริการ</th>
                                    <!-- ... คอลัมน์อื่น ๆ ของตาราง Pay ... -->
                                    <th scope="col">วันที่</th>
                                    <!-- <th scope="col">สลิป</th> -->
                                    <!-- ... คอลัมน์อื่น ๆ ของตาราง Request ... -->
                                    <th scope="col">ราคา </th>
                                    <th scope="col">ที่อยู่ </th>
                                    <th scope="col">สถานะ </th>
                                    <th scope="col">หมายเหตุ </th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pays as $pay)
                                    @php
                                        $request = $requests->where('requestID', $pay->requestID)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $pay->requestID }}</td>
                                        <td>{{ $request->customer->firstName }}</td> 
                                        <!-- ... แสดงข้อมูลคอลัมน์อื่น ๆ ของตาราง Pay ... -->
                                        <td>{{$pay -> datePay}}</td>
                                        <!-- <td>
                                            <img src="{{asset($pay->slipFile)}}" alt="">
                                        </td> -->
                                            @if($request)
                                            <td>{{ $request->price }}</td>
                                            <td>{{ $request->address }}</td>
                                            <td>
                                                @if ($request->statusID == 0)
                                                <div style="color: blue;" >
                                                    กำลังจอง
                                                </div>
                                                @elseif ($request->statusID == 1)
                                                <div style="color: red;" >
                                                    รอการตรวจสอบ
                                                </div>
                                                    
                                                @elseif ($request->statusID == 2)
                                                <div style="color: green;" >
                                                    ชำระเงินเรียบร้อย
                                                </div>
                                                @endif
                                            </td>                                            
                                            <!-- <td>{{ $request->statusID }}</td> -->
                                            <td style="color: red;">{{ $pay->comment }}</td>
                                            <td><a href="{{url('/pay/edit/'.$pay->payID)}}"class="btn btn-warning">ตรวจสอบ</a></td>
                                                <!-- ... แสดงข้อมูลคอลัมน์อื่น ๆ ของตาราง Request ... -->
                                            @else
                                                No request found
                                            @endif
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
