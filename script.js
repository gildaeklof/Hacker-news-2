//Like
const sendLike = (post_id) => {
    fetch('/Account/send_like.php', {
        credentials: "include",
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            post_id: post_id
        })
    }).then(res => {
        return res.json()
    }).then(data => {
        console.log(data)
        likeIndicator = document.querySelector(`.post.id${post_id} .text-section .text-section-vote p`)

        likeIndicator.innerText = data.post_likes + data.addedlikeCount;
        //if data === true 
        //increase like count
    })

}


document.querySelectorAll('.upvote').forEach((upvote) => {
    upvote.addEventListener('click', (e) => { sendLike(e.currentTarget.parentElement.parentElement.dataset.post) })
})





//Dislike
const sendDislike = (post_id) => {
    fetch('/Account/send_dislike.php', {
        credentials: "include",
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            post_id: post_id
        })
    }).then(res => {
        return res.json()
    }).then(data => {
        console.log(data)
        likeIndicator = document.querySelector(`.post.id${post_id} .text-section .text-section-vote p`)

        likeIndicator.innerText = data.post_likes + data.addedlikeCount;
        //if data === true 
        //increase like count
    })

}


document.querySelectorAll('.downvote').forEach((upvote) => {
    upvote.addEventListener('click', (e) => { sendDislike(e.currentTarget.parentElement.parentElement.dataset.post) })
})

// 