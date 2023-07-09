<x-app-layout>
    
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class ="card">
                    <div class="card">
                        <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        <div class="card-body">
                            <form action="{{url('/provider/update/'.$provider->providerID)}}" method="post">
                            
                                @csrf
                                <div class="form-group">
                                    <label for="firstName">ชื่อ</label>
                                    <input type="text" class="form-control" name="firstName" value="{{$provider->firstName}}">

                                    <label for="last_name">นามสกุล</label>
                                    <input type="text" class="form-control" name="last_name" value="{{$provider->last_name}}">

                                    <label for="address">ที่อยู่</label>
                                    <input type="text" class="form-control" name="address" value="{{$provider->address}}">

                                    <label for="email">อีเมล</label>
                                    <input type="text" class="form-control" name="email" value="{{$provider->email}}">

                                    <label for="phon">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control py-2" name="phon" value="{{$provider->phon}}">
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
