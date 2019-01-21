var likePost = function likePost(postId, liked) {
    axios.post("/yeet/" + postId + "/like", {
        liked: liked
    });
};