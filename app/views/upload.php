<?php $this->setSiteTitle('Upload') ?>

<?php $this->start('body'); ?>

<script src="./js/camera.js"></script>

<div class="center black">
    <div>
        <div class="container padding-16" >
            <video style="border: solid 3px grey" id="video" muted>Video stream not available.</video>
        <br />
        <br />
            <button id="startbutton">Take photo</button>
        </div>
    </div>
    
    <div>
        <button class="button" id="sbutton2"><img id="s2" src="img/sticker/arrow2.png" style="width: 55px; padding: 10px; border: solid 3px grey"></button>
    </div>
    
    <div> 
        <button class="button" id="sbutton1"><img id="s1" src="img/sticker/arrow1.png" style="width: 70px; padding: 10px; border: solid 3px grey"></button>
        <canvas style="border: solid 3px grey" id="canvas" width=640 height=480></canvas>
        <button class="button" id="sbutton3"><img id="s3" src="img/sticker/arrow3.png" style="width: 70px; padding: 10px; border: solid 3px grey"></button>
    </div>
    
    <div>
        <button class="button" id="sbutton4"><img id="s4" src="img/sticker/arrow4.png" style="width: 55px; padding: 10px; border: solid 3px grey"></button>
        <br />
        <br />
        <button id="uploadbutton">Upload Image</button>
    </div>
        
        <br />
        <form action="upload/file" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" /><p></p>
            <input type="submit" value="Upload"/>
        </form>

    </div>
    <br />
</div>

<?php $this->end('body'); ?>