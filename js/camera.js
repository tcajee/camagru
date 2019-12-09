(function() {
    // The width and height of the captured photo. We will set the
    // width to the value defined here, but the height will be
    // calculated based on the aspect ratio of the input stream.
  
    var width = 320;    // We will scale the photo width to this
    var height = 0;     // This will be computed based on the input stream
  
    // |streaming| indicates whether or not we're currently streaming
    // video from the camera. Obviously, we start at false.
  
    var streaming = false;
  
    // The various HTML elements we need to configure or control. These
    // will be set by the startup() function.
  
    var video = null;
    var canvas = null;
    var photo = null;
    var startbutton = null;

    function startup() {
      video = document.getElementById('video');
      canvas = document.getElementById('canvas');
      startbutton = document.getElementById('startbutton');
      uploadbutton = document.getElementById('uploadbutton');
      sbutton1 = document.getElementById('sbutton1');
      sbutton2 = document.getElementById('sbutton2');
      sbutton3 = document.getElementById('sbutton3');
      sbutton4 = document.getElementById('sbutton4');

      uploadbutton.onclick = uploadPicture;
      sbutton1.onclick = addSticker1;
      sbutton2.onclick = addSticker2;
      sbutton3.onclick = addSticker3;
      sbutton4.onclick = addSticker4;
  
      navigator.mediaDevices.getUserMedia({video: true, audio: false})
      .then(function(stream) {
        video.srcObject = stream;
        video.play();
      })
      .catch(function(err) {
        console.log("An error occurred: " + err);
      });
  
      video.addEventListener('canplay', function(ev){
        if (!streaming) {
          height = video.videoHeight / (video.videoWidth/width);
        
          // Firefox currently has a bug where the height can't be read from
          // the video, so we will make assumptions if this happens.
        
          if (isNaN(height)) {
            height = width / (4/3);
          }
        
          video.setAttribute('width', width);
          video.setAttribute('height', height);
          canvas.setAttribute('width', width);
          canvas.setAttribute('height', height);
          streaming = true;
        }
      }, false);
  
      startbutton.addEventListener('click', function(ev){
        takepicture();
        ev.preventDefault();
      }, false);
      
      clearphoto();
    }
  
    // Fill the photo with an indication that none has been
    // captured.
  
    function clearphoto() {
      var context = canvas.getContext('2d');
      context.fillStyle = "#000";
      context.fillRect(0, 0, canvas.width, canvas.height);
    }
    
    // Capture a photo by fetching the current contents of the video
    // and drawing it into a canvas, then converting that to a PNG
    // format data URL. By drawing it on an offscreen canvas and then
    // drawing that to the screen, we can change its size and/or apply
    // other changes before drawing it.
  
    function takepicture() {
      var context = canvas.getContext('2d');
      if (width && height) {
        canvas.width = width;
        canvas.height = height;
        context.drawImage(video, 0, 0, width, height);
      }
    }

    function addSticker1() {
        var canvas = document.getElementById("canvas");
        var layer = canvas.getContext("2d");
        var img = document.getElementById("s1");
        layer.drawImage(img, 100, 20, 120, 120);

        s1 = true;
    }

    function addSticker2() {

        var canvas = document.getElementById("canvas");
        var layer = canvas.getContext("2d");
        var img = document.getElementById("s2");
        layer.drawImage(img, 100, 20, 120, 120);
        
        s2 = true;
    }

    function addSticker3() {

        var canvas = document.getElementById("canvas");
        var layer = canvas.getContext("2d");
        var img = document.getElementById("s3");
        layer.drawImage(img, 120, 30, 90, 90);
        
        s3 = true;
    }

    function addSticker4() {

        var canvas = document.getElementById("canvas");
        var layer = canvas.getContext("2d");
        var img = document.getElementById("s4");
        layer.drawImage(img, 120, 30, 90, 90);

        s4 = true;
    }

    function uploadPicture() {
          var file = canvas.toDataURL('image/png');
          var xhr = new XMLHttpRequest;
          xhr.onreadystatechange = function(res) {
            if (this.readyState == 4 && this.status == 200) {
              // console.log(file);
            }
          };
          xhr.open ('POST', 'upload/upload');
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.send("img=" + file);
      }
  
    window.addEventListener('load', startup, false);
  })();