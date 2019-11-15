<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css">
    <?=$this->content('head');?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><?=$this->siteTitle();?></title>
  </head>
  <body class="w3-black">
    <!-- HEADER DEF -->
    <div class="w3-center">
      <div class="w3-bar w3-black w3-card">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">HEADER</a>
      </div>
    </div>
    
    <!-- include page specific -->
    <?=$this->content('body'); ?>
    <!-- include page specific -->
    
    <!-- FOOTER DEF -->
    <div class="w3-center">
      <div class="w3-bar w3-black w3-card">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">FOOTER</a>
      </div>
    </div>
  </body>
</html>