(function () {

    let loaded = 0;
    let count = 0;
    
    function load() {
        
        function next() {
            resData = [];
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;
                    if (resData) {
                        gallery.innerHTML = resData;
                        var like = document.getElementById("likes");
                        likes.innerHTML = '';
                        likes.innerHTML = like;
                        var comment = document.getElementById("comments");
                        comments.innerHTML = '';
                        comments.innerHTML = comment;
                        gallery.innerHTML = '';
                        gallery.innerHTML = resData;
                        var counter = document.getElementById("counter");
                        count = Number(counter.innerHTML);
    
                        let posts = Array.from(document.getElementsByClassName('post'));
                        console.log(posts);
                        for (let post of posts) {
                            let postId = post.id;
                            let likeButton = post.querySelector('input');
                            likeButton.onclick = function() {
                                resData = [];
                                const xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function(res) {
                                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                        resData = res.target.response;
                                        if (resData) {
                                            likeButton.value = resData;
                                        } else {
                                            likeButton.value = 'FAILED';
                                            window.location.assign('gallery');
                                        }
                                    }
                                }
                                xhr.open('POST', 'gallery/like');
                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                let params = 'postId=' + postId;
                                xhr.send(params);
                            };
                        }
    
                    } else {
                        window.location.assign('gallery');
                    }
                }
            }
            xhr.open('POST', 'gallery/display');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = 'next=' + 1
            + '&count=' + count;
            xhr.send(params);
        }
        
        function prev() {
            resData = [];
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;
                    if (resData) {
                        gallery.innerHTML = resData;
                        var like = document.getElementById("likes");
                        likes.innerHTML = '';
                        likes.innerHTML = like;
                        var comment = document.getElementById("comments");
                        comments.innerHTML = '';
                        comments.innerHTML = comment;
                        gallery.innerHTML = '';
                        gallery.innerHTML = resData;
                        var counter = document.getElementById("counter");
                        count = Number(counter.innerHTML);
    
                        let posts = Array.from(document.getElementsByClassName('post'));
                        console.log(posts);
                        for (let post of posts) {
                            let postId = post.id;
                            let likeButton = post.querySelector('input');
                            likeButton.onclick = function() {
                                resData = [];
                                const xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function(res) {
                                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                        resData = res.target.response;
                                        if (resData) {
                                            likeButton.value = resData;
                                        } else {
                                            likeButton.value = 'FAILED';
                                            window.location.assign('gallery');
                                        }
                                    }
                                }
                                xhr.open('POST', 'gallery/like');
                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                let params = 'postId=' + postId;
                                xhr.send(params);
                            };
                        }

                    } else {
                        window.location.assign('gallery');
                    }
                }
            }
            xhr.open('POST', 'gallery/display');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = 'prev=' + 1
            + '&count=' + count;
            xhr.send(params);
        }
        
        function comment() {
            var inputComment = document.getElementById("commentin");
            resData = [];
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;
                    if (resData) {
        
                        console.log("here");
                        var comment = document.getElementById("comments");
                        comments.innerHTML = '';
                        comments.innerHTML = resData;
    
                    } else {
                        window.location.assign('gallery');
                    }
                }
            }
            xhr.open('POST', 'gallery/comment');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = 'comment=' + 1
            + '&comment=' + inputComment.value;
            xhr.send(params);
        }

        const gallery = document.getElementById("gallery");
        const likes = document.getElementById("likes");
        const comments = document.getElementById("comments");
        
        let prevbutton = document.getElementById("prev");
        let nextbutton = document.getElementById("next");
        let commentbutton = document.getElementById("commentbutton");

        prevbutton.onclick = prev;
        nextbutton.onclick = next;
        commentbutton.onclick = comment;
        
        if (!loaded) {
            resData = [];
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function (res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;
                    if (resData) {
                        gallery.innerHTML = resData;
                        var like = document.getElementById("likes");
                        likes.innerHTML = like;
                        var comment = document.getElementById("comments");
                        comments.innerHTML = comment;
                        gallery.innerHTML = resData;
                        var counter = document.getElementById("counter");
                        count = Number(counter.innerHTML);
                        
                        loaded = 1;
    
                        let posts = Array.from(document.getElementsByClassName('post'));
                        console.log(posts);
                        for (let post of posts) {
                            let postId = post.id;
                            let likeButton = post.querySelector('input');
                            likeButton.onclick = function() {
                                resData = [];
                                const xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function(res) {
                                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                        resData = res.target.response;
                                        if (resData) {
                                            likeButton.value = resData;
                                        } else {
                                            window.location.assign('gallery');
                                        }
                                    }
                                }
                                xhr.open('POST', 'gallery/like');
                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                let params = 'postId=' + postId;
                                xhr.send(params);
                            };
                        }

                    } else {
                        window.location.assign('gallery');
                    }
                }
            }
            xhr.open('POST', 'gallery/setup');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = 'start=' + 1
            + '&count=' + count;
            xhr.send(params);
        }
    }

    window.addEventListener('load', load, false);
})();