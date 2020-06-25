$(document).ready(function(){

	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });



	$('#addCategoryForm').parsley();

	$('#addCategoryForm').on('submit',function(e){

		e.preventDefault();
		
		if ($('#addCategoryForm').parsley().isValid()) {

			document.getElementById('addCategoryForm').submit();

		}

		
	});

	$('#editCategoryForm').parsley();

	$('#editCategoryForm').on('submit',function(e){

		e.preventDefault();
		
		if ($('#editCategoryForm').parsley().isValid()) {

			document.getElementById('editCategoryForm').submit();

		}

		
	});

	   $('#edit_category').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('category-name')
            var modal = $(this)
            modal.find('.modal-body #category_id').val(id);
            modal.find('.modal-body #edit_category_name').val(name);
        })






	 	$('#addCouponForm').parsley();

		$('#addCouponForm').on('submit',function(e){

			e.preventDefault();
			
			if ($('#addCouponForm').parsley().isValid()) {

				document.getElementById('addCouponForm').submit();

			}

			
		});

		$('#edit_coupon').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var coupon = button.data('coupon-name')
            var discount = button.data('discount')
            var modal = $(this)
            modal.find('.modal-body #coupon_id').val(id);
            modal.find('.modal-body #edit_coupon').val(coupon);
            modal.find('.modal-body #edit_discount').val(discount);
        })


})