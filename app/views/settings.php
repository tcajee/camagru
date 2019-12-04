<?php $this->setSiteTitle('Settings') ?>

<?php $this->start('body'); ?>

<div class="center black">
    <p>Update First and Last names</p>
    <form action="settings/names" method="POST">
    <input id="fname" type="text" name="fname" value="" placeholder="First Name"><p></p>
    <input id="lname" type="text" name="lname" value="" placeholder="Last Name"><p></p>
    <input id="update" type="submit" name="update" value="Update" /><p></p>
    </form>
    <br />
    
    <p>Upload Profile Photo</p>
    <form action="settings/upload" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" /><p></p>
        <input type="submit" value="Upload"/>
    </form>
    
    <br />

    <p>Change Password</p>
    <input id="pass" type="text" name="pass_update" value="" placeholder="Enter New Password"><p></p>
    <input id="vpass" type="text" name="vpass_update" value="" placeholder="Repeat New Password"><p></p>
    <input id="change_p" type="button" name="change_password" value="Change Password" /><p></p>
    
    <br />

    <p>Update Email</p>
    <form action="settings/email" method="POST">
    <input id="email" type="text" name="email_update" value="" placeholder="Update Email"><p></p>
    <input id="change_e" type="button" name="change_email" value="Change Email" /><p></p>
    </form>
    <br />
    
    <p>Update Preferances</p>
    <input id="preferace" type="checkbox" name="notifications" value="Recieve Notifications" /> Recieve Notifications
</div>

<!-- <script>./js/settings.js</script> -->

<?php $this->end('body'); ?>