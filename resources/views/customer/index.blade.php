<x-app-layout>
   <div class="py-12">
        <div class="container">
            <div class="row">
                    @if(session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
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
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($customer as $row)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$row -> firstName}}</td>
                            <td>{{$row -> lastName}}</td>
                            <td>{{$row -> address}}</td>
                            <td>{{$row -> email}}</td>
                            <td>{{$row -> mobilePhone}}</td>
                            <td><a href="{{url('/customer/edit/'.$row->custID)}}"class="btn btn-warning">แก้ไข</a></td>
                            <td><a href="{{url('/customer/delete/'.$row->custID)}}"class="btn btn-danger">ลบ</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                      
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
