$(document).ready(function(){


	$('#addSubCategoryForm').parsley();

	$('#addSubCategoryForm').on('submit',function(e){

		e.preventDefault();
		
		if ($('#addSubCategoryForm').parsley().isValid()) {

			document.getElementById('addSubCategoryForm').submit();

		}

		
	});


	$('#edit_sub_category').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var sub_categoryname = button.data('sub-category-name')
            var category_id = button.data('category-id')
            var modal = $(this)
            modal.find('.modal-body #sub_category_id').val(id);
            modal.find('.modal-body #edit_sub_category_name').val(sub_categoryname);
            modal.find('.modal-body #edit_category_id').val(category_id);
        })

	$('#editSubCategoryForm').parsley();

	$('#editSubCategoryForm').on('submit',function(e){

		e.preventDefault();
		
		if ($('#editSubCategoryForm').parsley().isValid()) {

			document.getElementById('editSubCategoryForm').submit();

		}

		
	});

})