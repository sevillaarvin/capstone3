const likePost = (postId, liked) => {
    axios.post(`/yeet/${postId}/like`, {
        liked,
    })
}

const likeComment = (liked) => {
    console.log(liked)
    // axios.post(`/greet/${commentId}/like`, {
    //     liked,
    // })
}

const likeBtns = document.querySelectorAll(".comment__like")
Array.from(likeBtns).forEach((button) => {
    button.addEventListener("click", (e) => {
        const form = button.parentElement
        form.liked.value = true
        form.submit()
    })
})
const dislikeBtns = document.querySelectorAll(".comment__dislike")
Array.from(dislikeBtns).forEach((button) => {
    button.addEventListener("click", (e) => {
        const form = button.parentElement
        form.liked.value = false
        form.submit()
    })
})
