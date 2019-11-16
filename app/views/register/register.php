<?php $this->setSiteTitle('Login') ?>

<?php $this->start('header'); ?>
<!-- Navbar -->
<!-- <div class="center">
<div class="bar black card">
    <a class="bar-item button padding-large hide-medium hide-large right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="bar-item button padding-large">HOME</a>
    <a href="#band" class="bar-item button padding-large hide-small">BAND</a>
    <a href="#tour" class="bar-item button padding-large hide-small">TOUR</a>
    <a href="#contact" class="bar-item button padding-large hide-small">CONTACT</a>
    <div class="dropdown-hover hide-small">
    <button class="padding-large button" title="More">MORE <i class="fa fa-caret-down"></i></button>     
    <div class="dropdown-content bar-block card-4">
        <a href="#" class="bar-item button">Merchandise</a>
        <a href="#" class="bar-item button">Extras</a>
        <a href="#" class="bar-item button">Media</a>
    </div>
    </div>
    <a href="javascript:void(0)" class="padding-large hover-red hide-small right"><i class="fa fa-search"></i></a>
</div>
</div> -->
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="center col-md-6 col-md-offset-3 well">
    <form class="form" action="<?=PROOT?>register/login" method="post">
    <h3 class="text-center">Login</h3>
        <div><?=$this->displayErrors?></div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form=control"> 
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form=control">
        </div>
        <div class="form-group">
            <label for="remember_me">Remember me:  
            <input type="checkbox" name="remember_me" id="remember_me" value="on">
            </label>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="button">
        </div>
        <div class="text-right">
            <a href="<?=PROOT?>register/register" class="text-primary">Register</a>
        </div>
    </form>
</div>
<?php $this->end(); ?>



<?php $this->start('footer'); ?>
<!-- Footer -->
<footer class="container padding-64 center opacity light-grey xlarge">
<i class="fa fa-facebook-official hover-opacity"></i>
<i class="fa fa-instagram hover-opacity"></i>
<i class="fa fa-snapchat hover-opacity"></i>
<i class="fa fa-pinterest-p hover-opacity"></i>
<i class="fa fa-twitter hover-opacity"></i>
<i class="fa fa-linkedin hover-opacity"></i>
</footer>
<?php $this->end(); ?>