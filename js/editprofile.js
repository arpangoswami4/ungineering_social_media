$(document).ready(function () {
    $('#editform').submit(function() {
        var url = "edit_profileback.php";
        var data = $('#editform').serialize();
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: editing_success,
            error: on_error   

        });
        return false;
    });
});

var editing_success = function (response) {
    response = JSON.parse(response);

    if (response.success) {
        alert(response.message);

    } else {
        alert(response.message);
    }
};
var on_error = function () {
    alert("something went wrong");
};
