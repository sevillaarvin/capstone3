const likePost = (postId, liked) => {
    axios.post(`/yeet/${postId}/like`, {
        liked,
    })
}
