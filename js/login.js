(function () {
    function startup() {
        // console.log('dom loaded');
        const errors = document.getElementById("errors");
        const inputUsername = document.getElementById("username");
        const inputPassword = document.getElementById("password");
        let submitbutton = document.getElementById("loginbutton");
        // console.log(submitbutton);
    
        submitbutton.onclick = onLogin;

        function onLogin() {
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function(res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;

                    if (resData) {
                        resErrors = resData.split(',');
                        resHTML = resErrors.map((error) => {return error + '<br />'}).join('');
                        errors.innerHTML = resHTML;
                        errors.style.display = "initial";
                    } else {
                        window.location.assign('profile');
                    }
                }
            }
            xhr.open('POST', 'login/login');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = 'username=' + inputUsername.value + '&password=' + inputPassword.value;
            xhr.send(params);
        }
    }
    window.addEventListener('load', startup, false);
})();