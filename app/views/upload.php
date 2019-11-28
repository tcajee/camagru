<?php $this->setSiteTitle('Upload') ?>

<?php $this->start('body'); ?>


    <script src="./js/camera.js"></script>

    <div class="camera">
        <video id="video">Video stream not available.</video>
        <button id="startbutton">Take photo</button>
    </div>

    <canvas id="canvas" width=640 height=480></canvas>
    
    <div class="output">
        <img id="photo" alt="The screen capture will appear in this box.">
    </div>

<?php $this->end(); ?>


