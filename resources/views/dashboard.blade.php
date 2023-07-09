<x-app-layout>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 

    <div class="content-wrapper">

      <div class="row">
        <div class="p-3 text-light-emphasis"></div>
      </div>
        
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
              <div class="inner">
                <h3> {{ $requestCount }}  รายการ</h3>
                <p>จำนวนการขอใช้บริการทั้งหมด</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="p-3 text-info-emphasis bg-info-subtle border border-info-subtle rounded-3">
              <div class="inner">
                <h3>{{$status1Count}}   รายการ</h3>
                <p>จำนวนรอการตรวจสอบ</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <!-- <div class="col-lg-3 col-6"> -->
          <!-- small box -->
          <!-- <div class="p-3 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-3">
              <div class="inner">
                <h3>{{ $status0Count }}   รายการ</h3>
                <p>จำนวนกำลังจอง</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
          </div>
        </div> -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
              <div class="inner">
                
                <h3>{{ $status2Count }}   รายการ<sup style="font-size: 20px"></sup></h3>
 
                <p>จำนวนชำระเงินแล้ว</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>


        


        





    </div>
</x-app-layout>
