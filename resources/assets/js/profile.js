let avatar = document.getElementsByClassName("profile__avatar")[0]
const upload = document.getElementById("profile-upload")
avatar.addEventListener("click", (e) => {
    upload.click()
})
upload.addEventListener("change", (e) => {
    if(!upload.files[0]) {
        return
    }

    const newAvatar = document.createElement("img")

    // TODO: Check file extension
    const fileName = upload.files[0].name
    const ext = fileName.substr(fileName.lastIndexOf(".") + 1).toLowerCase()

    const fileReader = new FileReader()
    fileReader.onload = (e) => {
        newAvatar.src = e.target.result
        newAvatar.classList.add("img-fluid")
        newAvatar.classList.add("profile__avatar")
        newAvatar.addEventListener("click", (e) => {
            upload.click()
        })
        avatar.parentElement.replaceChild(newAvatar, avatar)
        avatar = newAvatar
    }
    fileReader.readAsDataURL(upload.files[0])
})
