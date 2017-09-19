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
/*
$(document).on('click', '.button--edit-profile', function(ev){
    ev.preventDefault();
    var  btn_button = $(this);
    btn_button.html(' <i class="fa fa fa-spinner fa-spin"></i> ');
    var tbl_id = $(this).attr("id");
    $.ajax({
        cache: false,
        url: "/LearningApp/settings/profiles-edit.php",
        type: "POST",
        dataType: 'json',
        data: { cmd: "get_user_details", tbl_id: tbl_id },
        success: function(result) {	
            btn_button.html('<i class="fa fa-pencil" aria-hidden="true"></i>');
            console.log(result);
            $("#form_name").val("edit_user");
            $("#edit_id").val(result['profile_id']);
            $("#profile-name").val(result['profile_name']).focus();
            $("#profile-gender").val(result['profile_gender']).change();
            $("#profile-age").val(result['profile_age']).change();
			},
        error: function(xhr, resp, text) {
		  console.log(xhr, resp, text);
	    }
    });
    
});
*/
function getData() {
    $.ajax({
        type: "POST",
        url: "/LearningApp/settings/profiles-edit.php",
        data: "form_name=view$"+$('').serialize('#insert-profile'),
        success: function(html){
            $("#userData").html(html);
        }
    });
}
function editUser(id){
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "/LearningApp/settings/profiles-edit.php",
        data: "action_type=data&id="+id,
        success:function(data){
            $('#edit_id').val(data.id);
            $('#profile-name').val(data.name);
            $('#profile-gender').val(data.gender);
            $('#profile-age').val(data.age);
        }
    });
}       