(function () {

    function startup() {
        
        let count = 0;
       
        const gallery = document.getElementById("gallery");
        let prevbutton = document.getElementById("prev");
        let nextbutton = document.getElementById("next");
        prevbutton.onclick = prev;
        nextbutton.onclick = next;

        function next() {
            resData = [];
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;
                    if (resData) {
                        gallery.innerHTML = '';
                        gallery.innerHTML = resData;
                        count += 5;
                    } else {
                        window.location.assign('gallery');
                    }
                }
            }
            xhr.open('POST', 'gallery/load');
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
                        count -= 5;
                    } else {
                        window.location.assign('gallery');
                    }
                }
            }
            xhr.open('POST', 'gallery/load');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = 'prev=' + 1
            + '&count=' + count;
            xhr.send(params);
        }

    }

    window.addEventListener('load', startup, false);
})();