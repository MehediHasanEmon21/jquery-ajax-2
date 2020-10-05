

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <script src="{{asset('filter')}}/js/jquery-1.10.2.min.js"></script>
    <script src="{{asset('filter')}}/js/jquery-ui.js"></script>
    <script src="{{asset('filter')}}/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('filter')}}/css/bootstrap.min.css">
    <link href = "{{asset('filter')}}/css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('filter')}}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
          <br />
          <h2 align="center">Advance Ajax Product Filters in PHP</h2>
          <br />
            <div class="col-md-3">                        
        <div class="list-group">
          <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="{{intval($min_price)}}" />
                    <input type="hidden" id="hidden_maximum_price" value="{{intval($max_price)}}" />
                    <p id="price_show">{{intval($min_price)}} - {{intval($max_price)}}</p>
                    <div id="price_range"></div>
                </div>        
                <div class="list-group">
          <h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                  @foreach($product_brand as $brand)
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="{{$brand->product_brand}}"  > {{$brand->product_brand}}</label>
                    </div>
                   @endforeach
                    </div>
                </div>

        <div class="list-group">
          <h3>RAM</h3>
                    @foreach($product_ram as $row)
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="{{$row->product_ram}}" > {{$row->product_ram}} GB</label>
                    </div>
                    @endforeach
                </div>
        
        <div class="list-group">
          <h3>Internal Storage</h3>
  
                    @foreach($product_storage as $storage)
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="{{$storage->product_storage}}"  > {{$storage->product_storage}} GB</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">
              <br />
                <div class="row filter_data">
                  @foreach($products as $product)
                  <div class="col-sm-4 col-lg-3 col-md-3">
                      <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                        <img src="/filter/img/{{ $product->product_image }}" alt="" class="img-responsive" >
                        <p align="center"><strong><a href="#">{{$product->product_name}}</a></strong></p>
                        <h4 style="text-align:center;" class="text-danger" >{{$product->product_price}}</h4>
                        <p>Camera : {{$product->product_camera}} MP<br />
                        Brand : {{$product->product_brand}} <br />
                        RAM : {{$product->product_ram}} GB<br />
                        Storage : {{$product->product_storage}} GB </p>
                      </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

     <style>
        #loading {
            text-align: center;
            background: url('loader.gif') no-repeat center;
            height: 150px;
        }
    </style>



    <script type="text/javascript">
      
      $(function(){

            var min_price = parseInt($('#hidden_minimum_price').val());
            var max_price = parseInt($('#hidden_maximum_price').val());
            
            $('#price_range').slider({
              range:true,
              min:min_price,
              max:max_price,
              values:[min_price, max_price],
              step:500,
              stop:function(event, ui)
              {   console.log(ui)
                  $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                  $('#hidden_minimum_price').val(ui.values[0]);
                  $('#hidden_maximum_price').val(ui.values[1]);
                  filter_data()
                  
              }
          });


          function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });


              function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var brand = get_filter('brand');
                var ram = get_filter('ram');
                var storage = get_filter('storage');
                $.ajax({
                    url: "/api/fetch",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        brand: brand,
                        ram: ram,
                        storage: storage
                    },
                    success: function(data) {
                      $('.filter_data').html(data);
                    }
                });
            }


      })

    </script>





</body>

</html>
