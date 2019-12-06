<?php $this->setSiteTitle('Settings') ?>

<?php $this->start('body'); ?>

<div class="center black">
    <p>Update First and Last names</p>
    <form action="settings/names" method="POST">
    <input class="input center" id="fname" type="text" name="fname" value="" placeholder="First Name"><p></p>
    <input class="input center" id="lname" type="text" name="lname" value="" placeholder="Last Name"><p></p>
    <input class="button text-black grey" id="update" type="submit" name="update" value="Update" /><p></p>
    </form>
    <br />

    <p>Upload Profile Photo</p>
    <form action="settings/upload" method="POST" enctype="multipart/form-data">
        <input class="input center" type="file" name="image" /><p></p>
        <input class="button text-black grey" type="submit" value="Upload"/>
    </form>

    <br />

    <p>Change Password</p>
    <!-- <form action="settings/update_pass" method="POST"> -->
    <input class="input center" id="pass" type="password" name="pass_update" value="" placeholder="Enter New Password"><p></p>
    <input class="input center" id="vpass" type="password" name="vpass_update" value="" placeholder="Confirm New Password"><p></p>
    <input class="button text-black grey" id="change_p" type="submit" name="change_password" value="Change Password" ><p></p>
    <p id="errors" style="display: none; color: red;"></p>
    <!-- </form> -->

    <br />

    <p>Update Email</p>
    <form action="settings/update_email" method="POST">
    <input class="input center" id="email" type="email" name="update_email" value="" placeholder="Email"><p></p>
    <input class="button text-black grey" id="change_e" type="submit" name="change_email" value="Change Email"><p></p>
    </form>
    <br />

    <p>Update Preferences</p>
    <form action="settings/notifyon">
    <input class="button text-black grey" id="submit_on" type="submit" name="notify0" value="Notifications on"><p></p>
    </form>
    <form action="settings/notifyoff">
    <input class="button text-black grey" id="submit_off" type="submit" name="notify1" value="Notifications off"><p></p>
    </form>
</div>

<script src="./js/settings.js"></script>

<?php $this->end('body'); ?>
