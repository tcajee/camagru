<?php $this->setSiteTitle('Profile') ?>

<?php $this->start('body'); ?>

    <div class="center">
        <?php
            $_db = DB::getInstance();
            $username = $_db->query('SELECT username FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->username;
            echo "<h2>Welcome, $username!</h2>";
            $photo = $_db->query('SELECT photo FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->photo;
            if ($photo) {
                echo "<img style='width: 20%' src='$photo' alt='Profile photo'>";
            } else {
                echo "<img style='width: 20%;' src='img/profile/def4.jpg' alt='Profile photo'>";
            }
        ?>
    </div>

    <div class="padding-64 content center" id="photos">
        <?php
    
            $id = $_db->query('SELECT id FROM users WHERE token = ?', ['token'=>$_SESSION['user']])->results()[0]->id;
            
            
            $photos = $_db->query('SELECT img FROM posts WHERE user = ?', ['user'=>$id])->results();

            // dnd($photos);

            echo "<h2 class='text-light-grey'>Your Photos</h2>
            <div class='row-padding center' style='margin:0 -16px'>
            <div class='half center'>";

                foreach ($photos as $photo) {
                    echo "<img src=$photo->img alt='Uploads' style='width:20%'>";
                }

            echo "</div>";
        ?>
    </div>

<?php $this->end(); ?>
