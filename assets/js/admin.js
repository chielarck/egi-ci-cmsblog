 $(document).ready(function () {
 	$("select").select2({dropdownCssClass: 'dropdown-inverse'});
      $("#cb_menu").on("change", function () {
          if($(this).val() == 'second') {
          	 	$("#list_menu").prop('disabled',false);
          	} else {
          		$("#list_menu").prop('disabled',true);
          	}
      });
  });