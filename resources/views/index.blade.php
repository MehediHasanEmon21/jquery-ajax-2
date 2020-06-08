
<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | PHP AJAX Jquery - Load Dynamic Data in Bootstrap Tooltip</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">PHP AJAX Jquery - Load Dynamic Data in Bootstrap Tooltip</h2>
   <h3 align="center">Employee Data</h3>   
   <br /><br />
   
   <div class="table-responsive">
    <table class="table table-bordered">
     <tr>
      <th width="20%">ID</th>
      <th width="80%">Name</th>
     </tr>

    @foreach($employees as $emp)
     <tr>
      <td>{{$emp->id}}</td>
      <td><label><a href="#" class="hover" id="{{$emp->id}}">{{$emp->name}}</a></label></td>
     </tr>
     @endforeach
    </table>
   </div>
   <input type="" value="{{ URL::to('images') }}" id="path" name="">
  </div>
 </body>
</html>

<script>
  
  $(function(){
        var path = $('#path').val()
        $('.hover').tooltip({
          title: fetchData,
          html: true,
          placement: 'right'
        })

        function fetchData(){

            var fetch_data = '';
            var element = $(this)
            var id = element.attr('id');
            $.ajax({
              url: '/api/fetch',
              data: {id:id},
              async: false,
              method: 'POST',
              success: function(data){

                  fetch_data +=`
                  <p><img src="${path}/${data.image}" class="img-responsive img-thumbnail" /></p>
                  <p><label>Name :${data.name}</label></p>
                  <p><label>Address : </label><br />${data.address}</p>
                  <p><label>Gender : </label>${data.gender}</p>
                  <p><label>Designation : </label>${data.designation}</p>
                  <p><label>Age : </label>${data.age} Years</p>
                  `

              }
            })

            return fetch_data;

        }


  })

</script>







