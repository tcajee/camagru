<?php $this->setSiteTitle('Gallery') ?>

<?php $this->start('body'); ?>

    <div id="clear" class='center black padding-32'>
    </div>


    <br />
    <form action="upload/file" method="POST" enctype="multipart/form-data">
        <input class="button text-black grey"  type="submit" value="Prev"/>
        <input class="button text-black grey"  type="submit" value="Next"/>
    </form>
    <br />
<?php $this->end(); ?>