$(".settings__form").submit(function(e){
    e.preventDefault(); //prevent default submit
    var formData = new FormData(this); //data to send
    
    
    if($('#profile-name').val() == "") {
        $("#error-name").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>' + " Name is required");
        $("#profile-name").css({"border-bottom": "1px solid red"});
        
    } else {
    
     $.ajax({
			type:"POST", // type of request to send
            data: formData, // data to send
            processData: false,  // To send DOMDocument or non processed data file it is set to false
            contentType:false, // The content type used when sending data to the server.
			url:"/settings/profiles.php", // url to which the request is send
			success: function(result) {	  // A function to be called if request succeeds
                console.log(result);
                if(result.success == 1) {
                    $("#result").html('<i class="flaticon-mark" aria-hidden="true"></i>' + " Succes");
                    //window.location.reload();
                    //window.location = "/settings.php#kids";
                } else {
                    $("#result").html('<i class="flaticon-shape" aria-hidden="true"></i>');
                }
                
                var userId = $('.profile-save-btn').attr("value");
                console.log(userId);
                
                $.ajax({
                    url: "/settings/select-profiles-min.php",
                    method: "POST",
                    data:{userId:userId},
                    dataType: "json",
                    success: function(data) {
                        $(".profiles-min-content").html(data.data);
                        slideAction();
                    }
                });
			},
			dataType: 'json', // data type received
		  });  
    }
});

// Edit profile
$(".slide-viewer").on('click', ".button--edit-profile", function(){
    var profileId = $(this).attr("id");

    $.ajax({
        url: "/settings/select-profiles.php",
        method: "POST",
        data:{
            profileId:profileId
        },
        dataType: "json",
        success:function(result) {
            console.log(result);
            $('#profile-name').val(result.profile_name);
            $('#profile-gender').val(result.profile_gender);
            $('#profile-age').val(result.profile_age);
            $('#profile-strong').val(result.profile_strong);
            $('#profile-weak').val(result.profile_weak);
            $('#profile-likes').val(result.profile_likes);
            $('#profile-dislikes').val(result.profile_dislikes);
            $('#profileId').val(result.profile_id);
            $('#profileImg').attr('src', 'images/' + result.profile_avatar);
        }
    });
});


// Delete profile
$(".slide-viewer").on('click', '.button--delete-profile', function(){  
    var profileId = $(this).attr("id");
    var table = $('.table-avatar');
    $('[data-id='+profileId+']').hide();
    $.ajax({
        url: "/settings/delete-profiles.php",
        method: "POST",
        data:{profileId:profileId},
        dataType: "json"
        
    }).always(function(data){
        console.log(data);
        if(data.success == 1) {
            $('[data-id='+profileId+']').remove();
            return;
        } 
        $('[data-id='+profileId+']').show();
    });
});

// Load avatar with no refresh - change child avatar
$('#avatar').change(function(){
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
});
    
function imageIsLoaded(e) {
    $('.profile-avatar-change').css("display", "block");
    $('#profileImg').attr('src', e.target.result);
};

// Load user avatar with no refresh
$('#user-avatar').change(function(){
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
});
function imageIsLoaded(e) {
$('.profile-avatar').css("display", "block");
$('.account-avatar__img').attr('src', e.target.result);
};

// Change form value when user click edit btn
$(document).on('click', '.button--edit-profile', function(ev){
    $("#form_name").val("edit_user");
   console.log(this);
   
});

// Reload page and go to a specific div #
$(".slide-viewer").on('click', '.profiles-add', function(){
    //$('.settings__form').trigger('reset');
    window.location.reload();
    window.location = "/settings.php#kids";
    console.log(this);   
});

// Slider profiles
function slideAction() {
    
    var imageNumber = $(".slide");
    var currentImage = 0
    var lastImage = currentImage + 5; 
    
    function slideLeft() {
        var tmp = document.getElementsByClassName("slide")[currentImage];
        $(tmp).hide("slow");
        currentImage++;
        console.log(currentImage);
        return currentImage;
    }
    function slideRight() {
        var tmp = document.getElementsByClassName("slide")[currentImage - 1];
        $(tmp).show("slow");
        currentImage--;
        console.log(currentImage);
        return currentImage;
    }
    $(document).on("click", ".slide-arrow--right", function(){
        console.log(this);
        if (currentImage + 5 > imageNumber.length) {
            console.log("Try another arrow! :D");
        } else {
            slideLeft();
        }
    });
    $(document).on("click", ".slide-arrow--left", function(){
        console.log(this);
        if (currentImage == 0) {
            console.log("Try another arrow! :D");
        } else {
            slideRight();
        }
    });
    
    if (imageNumber.length <= 5) {
        for (var i = 0; i < 2; i++) {
            $(".slide-arrow").css("color", "#ededed");
        }
    }
}
slideAction();

/* Button avatar account hide */
if (document.getElementById('input__avatar--label')) {
    var labelCont = document.getElementById('input__avatar--label'); 
    var btnCont = document.getElementsByClassName('button__avatar')[0];
    labelCont.addEventListener('click', function(){
    console.log(this);
    btnCont.style.display = "block";
});
}