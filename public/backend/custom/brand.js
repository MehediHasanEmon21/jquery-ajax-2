

//add brand script

   
function selectLogo(event){
    console.log(event)
    if (event.files && event.files[0]) {
        var reader = new FileReader();

        reader.onload = function (event) {
            $('#brand-logo')
                .attr('src', event.target.result)
                .width(50)
                .height(50);
        };


        reader.readAsDataURL(event.files[0]);
        $("#brand-logo").css("display","block");

    }


}

    $('#addbrandForm').parsley();

    $('#addbrandForm').on('submit',function(e){

        e.preventDefault();
        
        if ($('#addbrandForm').parsley().isValid()) {

            document.getElementById('addbrandForm').submit();

        }

        
    });




//edit brand script 


   function editselectLogo(event){
    console.log(event)
    if (event.files && event.files[0]) {
        var reader = new FileReader();

        reader.onload = function (event) {
            $('#edit-brand-logo')
                .attr('src', event.target.result)
                .width(50)
                .height(50);
        };


        reader.readAsDataURL(event.files[0]);
        $("#brand-logo").css("display","block");

    }


}




    $('#edit_brand').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('brand-name')
            var image = button.data('image')
            var path = 'http://localhost/shop/'+image
            var modal = $(this)
            modal.find('.modal-body #brand_id').val(id);
            modal.find('.modal-body #edit_brand_name').val(name);
            $('#edit-brand-logo').attr('src',path);
        })


    $('#editBrandForm').parsley();

    $('#editBrandForm').on('submit',function(e){

        e.preventDefault();
        
        if ($('#editBrandForm').parsley().isValid()) {

            document.getElementById('editBrandForm').submit();

        }

        
    });