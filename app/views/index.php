<?php $this->setSiteTitle('Home') ?>

<?php $this->start('body'); ?>
    <div class="padding-large" id="camagru">
        <div class="padding-32 center black text-light" id="ind">
            <h1 class="jumbo"><span class="hide-small">Welcome to</span> Camagru.</h1>

                <br />

                <a href="<?=PROOT?>register"><button class="button text-black grey" id="registerbutton">Register</button></a>
                
                <br /><p class="text-light">Already a Member?</p>
                
                <a href= "<?=PROOT?>login"><button class="button text-black grey" id="loginbutton"> Login</button></a>

                <br />
        </div>
    </div>
<?php $this->end(); ?>