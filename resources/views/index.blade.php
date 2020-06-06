

<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
   #box
   {
    width:600px;
    background:gray;
    color:white;
    margin:0 auto;
    padding:10px;
    text-align:center;
   }
  </style>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center">Delete multiple rows by selecting checkboxes using Ajax Jquery with PHP</h3><br />

   <div class="table-responsive">
    <table class="table table-bordered">
     <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Delete</th>
     </tr>
     @csrf
    @foreach($countries as $country)
     <tr id="{{$country->id}}" >
      <td>{{ $country->id }}</td>
      <td>{{$country->name}}</td>
      <td><input type="checkbox" name="customer_id[]" class="delete_customer" value="{{$country->id}}" /></td>
     </tr>
   @endforeach
    </table>
   </div>
 
   <div align="center">
    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-success">Delete</button>
   </div>
       <script src="{{ asset('ajax/custom.js') }}"></script>
 </body>
</html>






