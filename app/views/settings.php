<?php $this->setSiteTitle('Settings') ?>

<?php $this->start('body'); ?>

<div class="center black">
    <p>Update First and Last names</p>
    <input id="fname" type="text" name="fname" value="" placeholder="First Name"><p></p>
    <input id="lname" type="text" name="lname" value="" placeholder="Last Name"><p></p>
    <input id="update" type="button" name="update" value="Update" /><p></p>
    <br />
    
    <!-- In your "php.ini" file, search for the file_uploads directive, and set it to On: -->
    <p>Upload Profile Photo</p>
    <form action="profilepic" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" /><p></p>
        <input type="submit" value="Upload"/>
    </form>
    <!-- <ul>
        <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
        <li>File size: <?php echo $_FILES['image']['size'];  ?>
        <li>File type: <?php echo $_FILES['image']['type']; ?>
        <li>File type: <?php var_dump($_FILES); ?>
    </ul> -->
    <!-- <input id="upload_ppic" type="button" name="upload_p" value="Choose File" /><p></p> -->
    <br />
    <p>Change Password</p>
    <input id="pass" type="text" name="pass_update" value="" placeholder="Enter New Password"><p></p>
    <input id="vpass" type="text" name="vpass_update" value="" placeholder="Repeat New Password"><p></p>
    <input id="change_p" type="button" name="change_password" value="Change Password" /><p></p>
    <br />
    <p>Update Email</p>
    <input id="email" type="text" name="email_update" value="" placeholder="Update Email"><p></p>
    <input id="change_e" type="button" name="change_email" value="Change Email" /><p></p>
    <br />
    <p>Update Preferances</p>
    <input id="preferace" type="checkbox" name="notifications" value="Recieve Notifications" /> Recieve Notifications
</div>

<!-- <script>./js/settings.js</script> -->

<?php $this->end('body'); ?>