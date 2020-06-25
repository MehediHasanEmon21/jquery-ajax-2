@foreach($products as $product)
      <li style="width: 100%">
        <div class="timeline-badge primary"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i></a></div>
        <div class="timeline-panel">
         <div class="timeline-heading">
          <div class="col-md-12" style="padding:15px; background-color:#eee; border-bottom:#ddd 1px solid;"><h3>{{ $product->product_name }}</h3></div>
         </div>
         <div class="timeline-body">
          <div class="row">
           <div class="col-md-4">
            <img src="{{ URL::to($product->image_one) }}"  class="img-thumbnail img-fluid" />
           </div>
           <div class="col-md-8">
            <p>{!! substr($product->product_details, 0, 400) !!}</p>
           </div>
          </div>
         </div>
        </div>
       </li>
             
 @endforeach

