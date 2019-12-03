// (function () {
//     function settings() {
//         // console.log('dom loaded');
//         const fname = document.getElementById("fname");
//         const lname = document.getElementById("lname");
//         let update = document.getElementById("update");
//         let profile = document.getElementById("uplaod_ppic");
//         let password = document.getElementById("change_p");
//         let email = document.getElementById("change_e");
//         let notify = document.getElementById("uplaod_ppic");


//         // console.log(submitbutton);
    
//         update.onclick = onUpdate;

//         function onUpdate() {

//             const xhr = new XMLHttpRequest();

//             let fname = fname.value;
//             let lname = lname.value;
//             let sqlf = "INSERT INTO $this->_db (fname), (fname)"
//             let sqll = "INSERT INTO users (lname), (fname)"
            
            
            
            

//         //     xhr.onreadystatechange = function(res) {
//         //         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//         //             resData = res.target.response;

//         //             if (resData) {
//         //                 resErrors = resData.split(',');
//         //                 resHTML = resErrors.map((error) => {return error + '<br />'}).join('');
//         //                 errors.innerHTML = resHTML;
//         //                 errors.style.display = "initial";
//         //             } else {
//         //                 window.location.assign('profile');
//         //             }
//         //         }
//         //     }
//         //     xhr.open('POST', 'login/login');
//         //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//         //     let params = 'username=' + inputUsername.value + '&password=' + inputPassword.value;
//         //     xhr.send(params);
//         }
//     }
//     window.addEventListener('load', startup, false);
// })();