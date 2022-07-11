$(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
    });
});


function hideYourselfName() {
    var x = document.getElementById("name-form");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function hideYourselfEmail() {
    var y = document.getElementById("email-form");
    if (y.style.display === "none") {
        y.style.display = "block";
    } else {
        y.style.display = "none";
    }
}

function hideYourselfPic() {
    var w = document.getElementById("pic-form");
    if (w.style.display === "none") {
        w.style.display = "block";
    } else {
        w.style.display = "none";
    }
}

function hideYourselfPass() {
    var z = document.getElementById("password-form");
    if (z.style.display === "none") {
        z.style.display = "block";
    } else {
        z.style.display = "none";
    }
}