<?php $this->setSiteTitle('Upload') ?>

<?php $this->start('body'); ?>
<script src="./js/camera.js"></script>

<div class="center black">
    <div id="photos">
        <h1 class="text-light-grey">Upload</h1>
    </div>
    <div class="row-padding">
        <div>
            <video id="video" muted>Video stream not available.</video>
        </div>
        <div class="container padding-32" id="photos">
            <button id="startbutton">Take photo</button>
        </div>
    </div>
    <div>
        <canvas id="canvas" width=640 height=480></canvas>
        <br />
        <div class="container padding-32" id="photos">
            <button id="stickerbutton">Sticker 1</button>
            <button id="stickerbutton">Sticker 2</button>
            <button id="stickerbutton">Sticker 3 </button>
            <button id="stickerbutton">Sticker 4</button>
        <br />
        <br />
            <button id="uploadbutton">Upload Image</button>
        </div>
        <br />
        <br />


        
        <form action="upload/file" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" /><p></p>
            <input type="submit" value="Upload"/>
        </form>

    </div>
    <br />
</div>

<?php $this->end('body'); ?>