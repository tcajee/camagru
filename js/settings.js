(function () {
    function startup() {
        console.log('dom loaded');
        const errors = document.getElementById("errors");
        const inputPassword = document.getElementById("pass");
        const inputVPassword = document.getElementById("vpass");
        let submitbutton = document.getElementById("change_p");
        console.log(submitbutton);
    
        submitbutton.onclick = onChange;

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
                    }
                }
            }
            xhr.open('POST', 'register/register');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            let params = '&password=' + inputPassword.value
            + '&vpassword=' + inputVPassword.value;
            xhr.send(params);
        }
    }

    window.addEventListener('load', startup, false);
})();