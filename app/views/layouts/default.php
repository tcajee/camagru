<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css">

    <?=$this->content('head');?>
        
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?=$this->siteTitle();?></title>

  </head>
  <body>

    <?=$this->content('header'); ?>
    <?=$this->content('body'); ?>
    <?=$this->content('footer'); ?>

  </body>
</html>