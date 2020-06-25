<!DOCTYPE html>
<html>
  <head>
    <title>Facebook Style Load Data in Timeline with PHP Mysql Ajax</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <style>
    .timeline {
      list-style: none;
      padding: 20px 0 20px;
      position: relative;
    }
    .timeline:before {
      top: 0;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 3px;
      background-color: #eeeeee;
      left: 50%;
      margin-left: -1.5px;
    }
    .timeline > li {
      margin-bottom: 20px;
      position: relative;
      width: 50%;
      float: left;
      clear: left;
    }
    .timeline > li:before,
    .timeline > li:after {
      content: " ";
      display: table;
    }
    .timeline > li:after {
      clear: both;
    }
    .timeline > li:before,
    .timeline > li:after {
      content: " ";
      display: table;
    }
    .timeline > li:after {
      clear: both;
    }
    .timeline > li > .timeline-panel {
      width: 95%;
      float: left;
      border: 1px solid #d4d4d4;
      /*border-radius: 2px;*/
      /*padding: 20px;*/
      position: relative;
      -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
      box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    }

    .timeline > li > .timeline-panel:before {
      position: absolute;
      top: 26px;
      right: -15px;
      display: inline-block;
      border-top: 15px solid transparent;
      border-left: 15px solid #ccc;
      border-right: 0 solid #ccc;
      border-bottom: 15px solid transparent;
      content: " ";
    }
    .timeline > li > .timeline-panel:after {
      position: absolute;
      top: 27px;
      right: -14px;
      display: inline-block;
      border-top: 14px solid transparent;
      border-left: 14px solid #fff;
      border-right: 0 solid #fff;
      border-bottom: 14px solid transparent;
      content: " ";
    }
    .timeline > li > .timeline-badge {
      color: #fff;
      width: 24px;
      height: 24px;
      line-height: 50px;
      font-size: 1.4em;
      text-align: center;
      position: absolute;
      top: 16px;
      right: -12px;
      /*background-color: #999999;*/
      z-index: 100;
      /*
      border-top-right-radius: 50%;
      border-top-left-radius: 50%;
      border-bottom-right-radius: 50%;
      border-bottom-left-radius: 50%;
      */
    }
    .timeline > li.timeline-inverted > .timeline-panel {
      float: right;
    }
    .timeline > li.timeline-inverted > .timeline-panel:before {
      border-left-width: 0;
      border-right-width: 15px;
      left: -15px;
      right: auto;
    }
    .timeline > li.timeline-inverted > .timeline-panel:after {
      border-left-width: 0;
      border-right-width: 14px;
      left: -14px;
      right: auto;
    }
    .timeline-badge > a {
      color: #C5C7C5 !important;
    }
    .timeline-badge a:hover {
      color: #000 !important;
    }
    .timeline-title {
      margin-top: 0;
      color: inherit;
    }
    .timeline-body{
        padding:15px;
    }
    .timeline-body > h1{
        font-size:22px;
    }
    .timeline-body > h2{
        font-size: 18px;
        font-weight: 700;
        margin:0;
    }
    .timeline-body > p,
    .timeline-body > ul {
        /*padding:20px;
        margin-bottom: 0;*/
        padding:0;
        margin-bottom: 10px;
    }
    .timeline-body > p + p {
      margin-top: 5px;
    }
    .timeline-footer{
        padding:20px;
        background-color:#f4f4f4;
    }
    .timeline-footer > a{
        cursor: pointer;
        text-decoration: none;
    }

    .timeline > li.timeline-inverted{
      float: right; 
      clear: right;
      margin-top: 30px;
      margin-bottom: 30px;
    }
    .timeline > li:nth-child(2){
      margin-top: 60px;
    }
    .timeline > li.timeline-inverted > .timeline-badge{
      left: -12px;
    }

    @media (max-width: 767px) {
        ul.timeline:before {
            left: 40px;
        }

        ul.timeline > li {
          margin-bottom: 20px;
          position: relative;
          width:100%;
          float: left;
          clear: left;
        }
        ul.timeline > li > .timeline-panel {
            width: calc(100% - 90px);
            width: -moz-calc(100% - 90px);
            width: -webkit-calc(100% - 90px);
        }

        ul.timeline > li > .timeline-badge {
            left: 28px;
            margin-left: 0;
            top: 16px;
        }

        ul.timeline > li > .timeline-panel {
            float: right;
        }

        ul.timeline > li > .timeline-panel:before {
          border-left-width: 0;
          border-right-width: 15px;
          left: -15px;
          right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
          border-left-width: 0;
          border-right-width: 14px;
          left: -14px;
          right: auto;
        }
        
      .timeline > li.timeline-inverted{
        float: left; 
        clear: left;
        margin-top: 30px;
        margin-bottom: 30px;
      }

      .timeline > li.timeline-inverted > .timeline-badge{
        left: 28px;
      }
    }
    </style>
  </head>
  <body>
    <br />
    <div class="container">
      <h3 align="center">Facebook Style Load Data in Timeline with PHP Mysql Ajax</h3>
      <br />
      <div class="card">
        <div class="card-header">Dynamic Data</div>
        <div class="card-body col-md-12">
          
          <ul class="timeline">
            
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
             @php
             $last_id = $product->id;
             @endphp
             
             @endforeach

            <li class="clearfix"  id="{{ $last_id }}" style="float: none;"></li>
          </ul>
          <div style="text-align: center;" id="loader" style="display: none">
            <img src="/images/200.gif">
          </div>
          <div id="no_more_data"></div>
        </div>
      </div>
      <br />
      <br />
    </div>
  </body>
</html>


<script>
  
     var action = 'inactive';
     $(window).scroll(function(){
      var last_id = $('.clearfix').attr('id');
      if(last_id != '')
      {
        if($(window).scrollTop() + $(window).height() > $(".timeline").height() && action == 'inactive')
        {
          action = 'active';
          setTimeout(function(){ 
            load_timeline_data(last_id); 
          }, 1000);
        }
      }
    });

    function load_timeline_data(last_id){


      var element = $('.clearfix');

      if (last_id > 1) {

               $.ajax({
                url: '/api/fetch/post',
                method: 'POST',
                data: {last_id: last_id},
                beforeSend:function(){
                  $('#loader').show()
                },
                success:function(data){
                  setTimeout(function(){
                    element.attr("id", data.id);
                    console.log(data.count);
                   $('.timeline').append(data.html);
             
                    $('#loader').hide()
                   
                   action = 'inactive';
                  },1000)
                  
                }
              })

      }else{
        $('#loader').hide()
        $('#no_more_data').html('<h2 style="text-align:center"><a class="btn = btn-danger">No Data Found</a></h2>')

      }

 

    }


</script>