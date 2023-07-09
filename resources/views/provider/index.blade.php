<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @if(session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <!-- <div class="card"> -->
                        <div class="card-header">ตารางข้อมูลพนักงานทั้งหมด</div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">ที่อยู่</th>
                                <th scope="col">เบอร์โทร</th>
                                <th scope="col">อีเมล</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($provider as $row)
                                <tr>
                                    <th>{{$provider->firstItem()+$loop->index}}</th>
                                    <td>{{$row -> firstName}}</td>
                                    <td>{{$row -> last_name}}</td>
                                    <td>{{$row -> address}}</td>
                                    <td>{{$row -> phon}}</td>
                                    <td>{{$row -> email}}</td>
                                    <td><a href="{{url('/provider/edit/'.$row->providerID)}}"class="btn btn-warning">แก้ไข</a></td>
                                    <td><a href="{{url('/provider/delete/'.$row->providerID)}}" class="btn btn-danger">ลบ</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                           {{$provider->links()}}
                    <!-- </div>   -->
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('addProvider')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="firstName">ชื่อ</label>
                                    <input type="text" class="form-control" name="firstName">

                                    <label for="last_name">นามสกุล</label>
                                    <input type="text" class="form-control" name="last_name">

                                    <label for="address">ที่อยู่</label>
                                    <input type="text" class="form-control" name="address">

                                    <label for="email">อีเมล</label>
                                    <input type="text" class="form-control" name="email">

                                    <label for="phon">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control py-2" name="phon">
                                </div>

                                <!-- แจ้งเตือนerror ทั้งหมด -->

                                @if($errors->any())
                                    <div class="my-2">
                                        <span class="text-danger">กรุณากรอกข้อมูลในครบถ้วน</span>
                                    </div>
                                @endif


                                    <!-- เว้นบรรทัด -->
                                    <br> 
                                <input type="submit" value="บันทึก" class="btn btn-primary">

                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
