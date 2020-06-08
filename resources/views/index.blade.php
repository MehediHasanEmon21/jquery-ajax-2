

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Ajax Jquery - Convert Divison tag to Editable HTML Form</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>  
           .divison_field{  
                padding:16px;  
           }  
           .divison_field:hover{  
                background-color:#f1f1f1;  
                border-radius:5px;  
                padding:16px;  
           }  
           </style>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Convert a DIV Area to an Editable HTML Form</h3><br />  
                <form id="submit_form" method="post">  
                     <div class="divison_field">  
                          <p><strong>Name - </strong>{{$employee->name}}</p>  
                          <p><strong>Gender - </strong>{{$employee->gender}}</p>  
                          <p><strong>Designation - </strong>{{$employee->designation}}</p>                                
                     </div>  
                     <div class="form_field" style="display:none;">  
                          <label>Name</label>  
                          <input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}" />  
                          <br />  
                          <label>Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Designation</label>  
                          <input type="text" name="designation" id="designation" class="form-control" value="{{$employee->designation}}" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" value="{{$employee->id}}"/>  
                          <button type="button" name="save" id="save" class="btn btn-info">Save</button>&nbsp;&nbsp;&nbsp;  
                          <button type="button" name="cancel" id="cancel" class="btn btn-cancel">Cancel</button>  
                     </div>  
                </form>  
                <br />                 
           </div>            
      </body>  
 </html>

 <script>
   
      
      $(function(){

            $(document).on('click','.divison_field',function(){
              $('.form_field').show()
              $(this).hide()

            })

            $(document).on('click','#cancel',function(){
              $('.form_field').hide()
              $('.divison_field').show()
            })

            $(document).on('click','#save',function(){

                var name = $('#name').val()
                var designation = $('#designation').val()

                if (name != '' && designation != '') {
                    $.ajax({
                      url: 'api/update',
                      data: $('#submit_form').serialize(),
                      method: 'POST',
                      success:function(data){
                        if(data != ''){

                          output =`<p><strong>Name - </strong>${data.name}</p>  
                          <p><strong>Gender - </strong>${data.gender}</p>  
                          <p><strong>Designation - </strong>${data.designation}</p>      `
                        }
                        $('.divison_field').html(output)
                        $('.form_field').hide();
                        $('.divison_field').show()
                      }
                    })

                }else{
                  alert('please insert value first')
                }

            })

      })


 </script> 
 






