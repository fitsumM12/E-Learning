"use strict";
// editting faculty profile

function EditProfile() {
    document
        .querySelector(".profile-button")
        .addEventListener("click", function() {
            const facEditProfile = document.querySelector("#facEditProfile");
            facEditProfile.style.display = "block";
            const facViewProfile = document.querySelector("#facViewProfile");
            facViewProfile.style.display = "none";
        });
}

//handling the student feedback
function display() {
    let commentCount = commentCount + 2;
    alert("hello");
    $("#feedback").load("load_comments.php", {
        commentNewCount: commentCount,
    });
}