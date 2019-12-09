<?php $this->setSiteTitle('Gallery') ?>

<?php $this->start('body'); ?>

    <script src="./js/gallery.js"></script>
   
    <div class='center black padding-32'>
        <div id="gallery" class='center black'>
        <p style='display: none; color: black;' id='counter' name='count'></p>
        </div>
        <br />
        <div id="buttons" class='center black' style="display: inline;">
            <input class="button text-black grey" id="prev" name="prev" type="submit" value="Prev"/>
            <input class="button text-black grey" id="next" name="next" type="submit" value="Next"/>
        </div>
        <br />
    </div>

<?php $this->end(); ?>