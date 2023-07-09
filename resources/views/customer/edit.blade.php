<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class ="card">
                    <div class="card">
                        <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        <div class="card-body">
                            <form action="{{url('/customer/update/'.$customer->custID)}}" method="post">
                            
                                @csrf
                                <div class="form-group">
                                    <label for="firstName">ชื่อ</label>
                                    <input type="text" class="form-control" name="firstName" value="{{$customer->firstName}}">

                                    <label for="lastName">นามสกุล</label>
                                    <input type="text" class="form-control" name="lastName" value="{{$customer->lastName}}">

                                    <label for="address">ที่อยู่</label>
                                    <input type="text" class="form-control" name="address" value="{{$customer->address}}">

                                    <label for="email">อีเมล</label>
                                    <input type="text" class="form-control" name="email" value="{{$customer->email}}">

                                    <label for="mobilePhone">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control py-2" name="mobilePhone" value="{{$customer->mobilePhone}}">
                                </div>

                                <!-- แจ้งเตือนerror ทั้งหมด -->
                                @if($errors->any())
                                    <div class="my-2">
                                        <span class="text-danger">กรุณากรอกข้อมูลในครบถ้วน</span>
                                    </div>
                                @endif
                                    <!-- เว้นบรรทัด -->
                                    <br> 
                                <input type="submit" value="อัพเดต" class="btn btn-success">

                            </form>
                        </div>
                    </div>  
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
