(function () {
    
    function load() {

        let loaded = 0;
        let count = 0;
       
        const gallery = document.getElementById("gallery");
        const likes = document.getElementById("likes");
        const comments = document.getElementById("comments");
        let prevbutton = document.getElementById("prev");
        let nextbutton = document.getElementById("next");
        prevbutton.onclick = prev;
        nextbutton.onclick = next;

        if (!loaded) {
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

                        // resData.removeChild('likes'); 
                        // resData.removeChild('comments'); 
                        gallery.innerHTML = '';
                        gallery.innerHTML = resData;

                        var counter = document.getElementById("counter");
                        count = Number(counter.innerHTML);
                        console.log('count' + count);
                        loaded = 1;
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

        function next() {
            resData = [];
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;
                    if (resData) {
                        gallery.innerHTML = '';
                        gallery.innerHTML = resData;
                        var counter = document.getElementById("counter");
                        count = Number(counter.innerHTML);

                        console.log('count' + count);

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
                        gallery.innerHTML = '';
                        gallery.innerHTML = resData;
                        var counter = document.getElementById("counter");
                        count = Number(counter.innerHTML);

                        console.log('count' + count);

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

    }
    window.addEventListener('load', load, false);
})();