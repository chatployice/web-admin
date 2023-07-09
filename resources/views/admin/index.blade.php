<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="row">
                        @if(session("success"))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $row)
                            <tr>
                                <th>{{$admin->firstItem()+$loop->index}}</th>
                                <td>{{$row -> name}}</td>
                                <td>{{$row -> email}}</td>
                                <td><a href="{{url('/admin/delete/'.$row->id)}}"class="btn btn-danger">ลบ</a></td>
                            </tr>
                            @endforeach
                        </tbody> 
                            {{$admin->links()}}
                      </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary btn-lg">
                            <a href="{{ route('show') }}" class="btn btn-primary">เพิ่มแอดมิน</a>
                        </button>
            
                      </div>
                        
                        

                            
                            
                        
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
