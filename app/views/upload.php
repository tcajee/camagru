<?php $this->setSiteTitle('Upload') ?>

<?php $this->start('body'); ?>

<div class="center black">
    <div id="photos">
        <h1 class="text-light-grey">Upload</h1>
    </div>
    <hr>
    <div class="row-padding">
        <div>
            <video style="muted: muted;" id="video">Video stream not available.</video>
        </div>
        <div class="container padding-32" id="photos">
            <button id="startbutton">Take photo</button>
        </div>
    </div>
    <div>
        <canvas id="canvas" width=640 height=480></canvas>
        <br />
        <button id="stickerbutton">Save Sticker</button>
        <br />
        <br />
        <button id="uploadbutton">Upload Image</button>
    </div>
    <br />
</div>
<script src="./js/camera.js"></script>

<?php $this->end('body'); ?>