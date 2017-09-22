$("#insert-profile").submit(function(e){
    e.preventDefault(); //prevent default submit
    var formData = new FormData(this); //data to send
 
     $.ajax({
			type:"POST",
            data: formData,
            processData: false,
            contentType:false,
			url:"/LearningApp/settings/profiles.php",
			success: function(result) {	
                console.log(result);
                if(result.success == 1) {
                    $("#result").html('<i class="fa fa-check" aria-hidden="true"></i>');
                } else {
                    $("#result").html('<i class="fa fa-times" aria-hidden="true"></i>');
                }
			},
			dataType: 'json',
		  });   
});

$(document).on('click', '.button--edit-profile', function(ev){
    ev.preventDefault();
    var  btn_button = $(this);
    $("#formName").val("update_user");
  
});




