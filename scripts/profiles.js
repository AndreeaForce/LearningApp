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
                    $("#result").html('<i class="fa fa-check" aria-hidden="true"></i>' + " Succes");
                } else {
                    $("#result").html('<i class="fa fa-times" aria-hidden="true"></i>');
                }
                var userId = $('.profile-save-btn').attr("value");
                console.log(userId);
                $.ajax({
                    url: "/settings/select-profiles-min.php",
                    method: "POST",
                    data:{userId:userId},
                    dataType: "json",
                    success: function(data) {
                    console.log(data)
                        $('#profile-name').val(data.profile_name);
                        $('#profileId').val(data.profile_id);
                        $('#profileImg').attr('src', data.profile_avatar);
                    }
                });
			},
			dataType: 'json',
		  });  
    }
});

// Edit profile
$(".button--edit-profile").on('click', function(){
    var profileId = $(this).attr("id");

    $.ajax({
        url: "/settings/select-profiles.php",
        method: "POST",
        data:{profileId:profileId},
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
$(".button--delete-profile").on('click', function(){  
    var profileId = $(this).attr("id");
    var table = $('.table-avatar');
    console.log(this);
    $.ajax({
        url: "/settings/delete-profiles.php",
        method: "POST",
        data:{profileId:profileId},
        dataType: "json"
        
    }).done(function(){
        table.remove();
        window.location.reload();
    });
});

// Load avatar with no refresh
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

// Change form value when user click edit btn
$(document).on('click', '.button--edit-profile', function(ev){
    $("#form_name").val("edit_user");
   console.log(this);
   
});

// Reload page and go to a specific div #
$('.profiles-add').on('click', function(){
   window.location.reload();
    window.location = "/settings.php#kids";
    console.log(this);

    
});

// Slider profiles
var leftArrow = document.getElementsByClassName('slide-arrow--left')[0];
var rightArrow = document.getElementsByClassName('slide-arrow--right')[0];
var arrowCont = document.getElementsByClassName('slide-arrow');

var slide = document.querySelectorAll('.slide');
var imageNumber = slide.length;
var currentImage = 0
var lastImage = currentImage + 5;

function slideLeft() {
    slide[currentImage].style.display='none';
    currentImage ++;
    console.log(currentImage);
    return currentImage;
}
function slideRight() {
       slide[currentImage - 1].style.display='block';
       currentImage --;
       console.log(currentImage);
       return currentImage;    
}

rightArrow.addEventListener('click', function(){
    console.log(this);
    if (currentImage + 5 > imageNumber) {
        console.log("Try another arrow! :D");
    } else {
        slideLeft();
    } 
});

leftArrow.addEventListener('click', function(){
    console.log(this);
    if (currentImage == 0) {
        console.log("Try another arrow! :D");
    } else {
        slideRight();
    }
});

if (imageNumber <= 5) {
    for (var i = 0; i < arrowCont.length; i++) {
        arrowCont[i].style.color = '#ededed';
    }
}
