const avatar = document.getElementsByClassName("profile__avatar")[0]
const upload = document.getElementById("profile-upload")
avatar.addEventListener("click", (e) => {
    upload.click()
})
