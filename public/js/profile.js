var avatar = document.getElementsByClassName("profile__avatar")[0];
var upload = document.getElementById("profile-upload");
avatar.addEventListener("click", function (e) {
    upload.click();
});