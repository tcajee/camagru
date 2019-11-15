<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=PROOT?>/css/custom.css">
    <title><?=$this->siteTitle();?></title>
    
    <!-- include page specific -->
    <?=$this->content('head');?>
    <!-- include page specific -->

  </head>
  <body class="black">
    <!-- HEADER DEF -->
    <div class="center">
      <div class="bar black card">
        <a href="#" class="bar-item button padding-large">HEADER</a>

        <?php
        if (isset($_SESSION[SESSION_NAME])) {
          echo "<a href=\"#\" class=\"bar-item button padding-large\">LOGGED IN</a>";
        } else  {
          echo "<a href=\"#\" class=\"bar-item button padding-large\"> NOT LOGGED IN</a>";
        }
        ?>
      </div>
    </div>
    
    <!-- include page specific -->
    <?=$this->content('body'); ?>
    <!-- include page specific -->
    
    <!-- FOOTER DEF -->
    <div class="center">
      <div class="bar black card">
        <a href="#" class="bar-item button padding-large">FOOTER</a>
      </div>
    </div>
  </body>
</html>