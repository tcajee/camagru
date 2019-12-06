(function () {

    function startup() {
        const contentHeight = 800;
        const pageHeight = document.documentElement.clientHeight;
        const scrollPosition = window.pageYOffset;        
        const n = 9;
                
        function putImages(){
            if (xmlhttp.readyState==4) {
                if (xmlhttp.responseText) {
                    var resp = xmlhttp.responseText.replace("\r\n", ""); 
                    var files = resp.split(";");
                    var j = 0;
                    for(i=0; i<files.length; i++) {
                        if (files[i] != "") {
                            document.getElementById("container").innerHTML += '<a href="img/'+files[i]+'"><img src="img/'+files[i]+'" /></a>';
                            j++;
                            if (j == 3 || j == 6) {
                                document.getElementById("container").innerHTML += '';
                            } else if (j == 9) {
                                document.getElementById("container").innerHTML += '<p>'+(n-1)+" Images Displayed | <a href='#header'>top</a></p><hr />";
                                j = 0;
                            }
                        }
                    }
                }
            }
        }
                        
        function scroll() {
            if ((contentHeight - pageHeight - scrollPosition) < 500) {
                if (window.XMLHttpRequest) {
                    xhr = new XMLHttpRequest();
                } else {
                    if (window.ActiveXObject) {
                        xhr = new ActiveXObject("Microsoft.XMLHTTP");
                    } else {
                        alert ("Bummer! Your browser does not support XMLHTTP!");         
                    }
                xhr.open('POST', 'gallery/load');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                let params = 'n=' + n;
                xhr.send(params);

                xhr.onreadystatechange=putImages;       
                contentHeight += 800;       
            }
        }
    }
}
    window.addEventListener('load', startup, false);
})();