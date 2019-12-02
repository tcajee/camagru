<?php $this->setSiteTitle('Settings') ?>

<?php $this->start('body'); ?>

<div class="center black">
    <input id="fname" type="text" name="fname" value="" placeholder="First Name"><p></p>
    <input id="lname" type="text" name="lname" value="" placeholder="Last Name"><p></p>
    <input id="submit" type="button" name="Submit" value="Submit" /><p></p>
    <br />
    <input id="upload_ppic" type="button" name="upload" value="Upload Profile Picture" /><p></p>
    <input id="change_p" type="button" name="change_password" value="Change Password" /><p></p>
    <input id="change_e" type="button" name="change_email" value="Change Email" /><p></p>
</div>

<?php $this->end('body'); ?>