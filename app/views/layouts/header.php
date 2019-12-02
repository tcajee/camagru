<?php 
  if (isset($_SESSION['user'])) {
    echo  "<div class='center'>
    <hr>
    <div class='bar black card'>
      <a href='profile' class='bar-item button padding-small'><img style='width: 20px' src='img/profile/def4.jpg'</a>
      <a href='settings' class='bar-item button padding-small'>SETTINGS</a>
      <a href='#' class='bar-item button padding-small'>GALLERY</a>
      <a href='upload' class='bar-item button padding-small'>UPLOAD</a>
      <a href='logout' class='bar-item button padding-small'>LOGOUT</a>
    </div>
    <hr>
    </div>";
  } 
?>
