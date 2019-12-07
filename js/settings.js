(function () {
    function startup() {
        //console.log('dom loaded');
        // Password Errors
        const errors = document.getElementById("errors");
        const inputPassword = document.getElementById("pass");
        const inputVPassword = document.getElementById("vpass");
        let passbutton = document.getElementById("change_p");
       
        // Email Errors
        const e_errors = document.getElementById("e_errors");
        const inputEmail = document.getElementById("email");
        let emailbutton = document.getElementById("change_e");
        //console.log(submitbutton);
    
        passbutton.onclick = onChange;
        emailbutton.onclick = onEmail;

        function onChange() {
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
                        window.location.assign('login');
                    }
                }
            }
            xhr.open('POST', 'settings/pass');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = '&password=' + inputPassword.value
            + '&vpassword=' + inputVPassword.value;
            xhr.send(params);
        }

        function onEmail() {
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function(res) {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    resData = res.target.response;

                    if (resData) {
                        resErrors = resData.split(',');
                        resHTML = resErrors.map((error) => {return error + '<br />'}).join('');
                        e_errors.innerHTML = resHTML;
                        e_errors.style.display = "initial";
                    } else {
                        window.location.assign('settings');
                    }
                }
            }
            xhr.open('POST', 'settings/update_email');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = '&email=' + inputEmail.value;
            xhr.send(params);
        }
    }

    window.addEventListener('load', startup, false);
})();