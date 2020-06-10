<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Modal with Dynamic Previous & Next Data Button by Ajax PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container">
   <h2 align="center">Modal with Dynamic Previous & Next Data Button by Ajax PHP</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <th>ID</th>
      <th>Details</th>
      <th>Code</th>
      <th>View</th>
     </tr>
     @foreach($products as $product)
      <tr>
       <td>{{$product->id}}</td>
       <td>{!! substr($product->product_details, 0, 100) !!}</td>
       <td>{{$product->product_code}}</td>
       <td><button type="button" name="view" class="btn btn-info view" id="{{$product->id}}" >View</button></td>
      </tr>
     @endforeach
    </table>
   </div>
   
  </div>
 </body>
</html>

<div id="post_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content"> 
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Post Details</h4>
   </div>
   <div class="modal-body" id="post_detail">
      

 
   </div>

   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>
  
  $(function(){

      $(document).on('click','.view',function(){

        var id = $(this).attr('id')
        fetch_post(id)

      })


      function fetch_post(id){

        $.ajax({
          url: '/api/fetch',
          method: 'POST',
          data: {id:id},
          success: function(data){
            $('#post_modal').modal('show');
            $('#post_detail').html(data)
          }
        })

      }

      $(document).on('click','.previous',function(){

        var id = $(this).attr('id')
        fetch_post(id)

      })

      $(document).on('click','.next',function(){

        var id = $(this).attr('id')
        fetch_post(id)

      })


  })


</script>