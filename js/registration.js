$(document).ready(function(){
    $(".registration_form").submit( function(){
        var url = "registration_submit.php";
        var data = $(".registration_form").serialize();
        $.ajax({
            url: url,
            data: data,
            success: registration_success,
            error: onerror,
            type:"POST",
        });
        return false;
    });
});
var registration_success = function (response) {
    response = JSON.parse(response);
        if(response.success) {
            window.location.href="homepage.php";
        }
        else{
            alert(response.message);
        }
};
    
    
var onerror=function(){
    alert("Something went wrong");
};

