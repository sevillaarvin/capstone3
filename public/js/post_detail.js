var likePost = function likePost(postId, liked) {
    axios.post("/yeet/" + postId + "/like", {
        liked: liked
    });
};

var likeComment = function likeComment(liked) {
    console.log(liked);
    // axios.post(`/greet/${commentId}/like`, {
    //     liked,
    // })
};

var likeBtns = document.querySelectorAll(".comment__like");
Array.from(likeBtns).forEach(function (button) {
    button.addEventListener("click", function (e) {
        var form = button.parentElement;
        form.liked.value = true;
        form.submit();
    });
});
var dislikeBtns = document.querySelectorAll(".comment__dislike");
Array.from(dislikeBtns).forEach(function (button) {
    button.addEventListener("click", function (e) {
        var form = button.parentElement;
        form.liked.value = false;
        form.submit();
    });
});