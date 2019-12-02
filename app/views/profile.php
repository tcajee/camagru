<?php $this->setSiteTitle('Profile') ?>

<?php $this->start('body'); ?>

    <div class="center">

        <h1>My Profile</h1>
        <?php
            $_db = DB::getInstance();
            $photo = $_db->query('SELECT photo FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->photo;
            echo "<img src='$photo' alt='Profile photo'>";
        ?>
        
    </div>
<!-- Portfolio Section -->
<div class="padding-64 content center" id="photos">
    <h2 class="text-light-grey">My Photos</h2>
    <hr style="width:200px" class="opacity">
    <!-- Grid for photos -->
    <div class="row-padding center" style="margin:0 -16px">
    <div class="half">

        <!-- <img src="/w3images/sailboat.jpg" alt='Uploads' style="width:100%"> -->
    </div>
    <div class="half center">
        <!-- <img src="/w3images/p6.jpg" alt='Uploads' style="width:100%"> -->
    </div>
    <!-- End photo grid -->
    </div>
<!-- End Portfolio Section -->
</div>

<?php $this->end(); ?>
