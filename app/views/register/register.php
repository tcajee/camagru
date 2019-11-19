<?php $this->setSiteTitle('Login') ?>

<?php $this->start('body'); ?>
<div class="center">
    <form class="form" action="<?=PROOT?>register/register" method="post">
        <h3 class="text-center">Register</h3>
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
                    <input type="submit" value="Login" class="button">
                </div>
                <div class="text-right">
                    <a href="<?=PROOT?>register/login" class="text-primary">Login</a>
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