var avatar = document.getElementsByClassName("profile__avatar")[0];
var upload = document.getElementById("profile-upload");
avatar.addEventListener("click", function (e) {
    upload.click();
});
upload.addEventListener("change", function (e) {
    if (!upload.files[0]) {
        return;
    }

    var newAvatar = document.createElement("img");

    // TODO: Check file extension
    var fileName = upload.files[0].name;
    var ext = fileName.substr(fileName.lastIndexOf(".") + 1).toLowerCase();

    var fileReader = new FileReader();
    fileReader.onload = function (e) {
        newAvatar.src = e.target.result;
        newAvatar.classList.add("img-fluid");
        newAvatar.classList.add("profile__avatar");
        newAvatar.addEventListener("click", function (e) {
            upload.click();
        });
        avatar.parentElement.replaceChild(newAvatar, avatar);
        avatar = newAvatar;
    };
    fileReader.readAsDataURL(upload.files[0]);
});