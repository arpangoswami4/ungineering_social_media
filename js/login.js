$(document).ready(function(){
    $(".r1r2c1r2c1r4").mouseover(function(){
        $(this).css("background-color","red");
    })
    .mouseout(function(){
        $(this).css("background-color","#EF4C4D");
    });
    $(".new,.Create").mouseover(function(){
        $(this).css("color","red");
    })
    .mouseout(function(){
        $(this).css("color","#EF4C4D");
    });
    $(".black").mouseover(function(){
        $(this).css("color","black");
    })
    .mouseout(function(){
        $(this).css("color","#373737");
    });
    $(".login_form").submit( function(){
        var url = "login_submit.php";
        var data = $(".login_form").serialize();
        $.ajax({
            url: url,
            data: data,
            success: login_success,
            error: onerror,
            type:"POST",
        });
        return false;
    });
});
var login_success = function (response) {
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
        
