<div class="row">
  <?php 
    $provides=DB::table('provides')->get();
  ?>
  @if($provides)   
  @foreach($provides as $provide)
      <?php 
        $service=DB::table('services')->find($provide->service_id);
        $facility=DB::table('facilities')->find($provide->facility_id);
       ?>
       @if($service->has_limit==1)  
        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>{{$facility->facility_name}}</h4>
              <p>Currently used:: <span style="font-size: 20px;">{{ $provide->currently_used}}</span></p>
              <p>Remain:: <span style="font-size: 20px;">{{$provide->service_limit - $provide->currently_used}}</span></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endif
        <!-- ./col -->
    @endforeach 
    @else
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Empty Facility Name</h4>
              
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    @endif   
      </div>