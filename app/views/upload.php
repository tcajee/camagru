<?php $this->setSiteTitle('Upload') ?>

<?php $this->start('body'); ?>

<script src="./js/camera.js"></script>

<div class="center black">
    <div>
        <div class="container padding-16" >
            <video style="border: solid 3px grey" id="video" muted>Video stream not available.</video>
        <br />
        <br />
            <button class="button text-black grey" id="startbutton">Take photo</button>
        </div>
    </div>
    
    
    <div> 
        <canvas style="border: solid 3px grey" id="canvas" width=640 height=480></canvas>
    </div>
    
    <div>
        <button class="button text-black grey" id="sbutton1"><img id="s1" src="img/sticker/g1.png" style="width: 70px; "></button>
        <button class="button text-black grey" id="sbutton2"><img id="s2" src="img/sticker/g2.png" style="width: 70px; "></button>
        <button class="button text-black grey" id="sbutton3"><img id="s3" src="img/sticker/g4.png" style="width: 70px; "></button>
        <button class="button text-black grey" id="sbutton4"><img id="s4" src="img/sticker/g5.png" style="width: 70px; "></button>
        <br />
        <br />
        <button class="button text-black grey" id="uploadbutton">Upload Image</button>
    </div>
        
        <br />
        <form action="upload/file" method="POST" enctype="multipart/form-data">
            <input class="input center" type="file" name="image" /><p></p>
            <input class="button text-black grey"  type="submit" value="Upload File"/>
        </form>

    </div>
    <br />
</div>

<?php $this->end('body'); ?>