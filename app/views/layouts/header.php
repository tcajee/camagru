<?php 
  if (isset($_SESSION['user'])) {
    echo  "<div class='center'>
    <hr>
    <div class='bar black card'>
      <a href='profile' class='bar-item button padding-small'><img style='width: 20px' src='img/profile/def4.jpg'></a>
      <a href='settings' class='bar-item button padding-small'><img style='width: 25px' src='img/icons/settings.png'></a>
      <a href='#' class='bar-item button padding-small'><img style='width: 25px' src='img/icons/Gallery.png'></a>
      <a href='upload' class='bar-item button padding-small'><img style='width: 25px' src='img/icons/Upload.png'></a>
      <a href='logout' class='bar-item button padding-small'><img style='width: 25px' src='img/icons/Power.png'></a>
    </div>
    <hr>
    </div>";
  } 
?>
