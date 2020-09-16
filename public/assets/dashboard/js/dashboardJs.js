$(document).ready(function(){
    $(".hamburger .hamburger__inner").click(function(){
        $(".wrapper").toggleClass("active")
    })

    $(".top_navbar .fa").click(function(){
        $(".profile_dd").toggleClass("active");
    });


//upload image handle
$("#imageContiner").click(function () {
    $("#file").click();
});
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imageContiner > img').remove();
            $('#imageContiner').append('<img src="' + e.target.result + '" width="300" height="150"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});


//jquery tabs

$("#tabs").on("click","li",function () {
    const tabs_id=$(this).attr("id");
    console.log(tabs_id);
    $(this).addClass("active").siblings().removeClass("active");
    $("#" + tabs_id + '_content').addClass("display-block").siblings().removeClass("display-block");
});



});

