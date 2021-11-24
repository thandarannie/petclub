<!-- Modal -->
<?php 
 $services=DB::table('services')->where('pub_status',1)->get();
 ?>
@foreach($services as $service)
<div class="modal fade" id="service-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$service->service_name}} service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12 alert alert-secondary">
           <p>{{$service->notes}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach