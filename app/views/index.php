<?php $this->setSiteTitle('Home') ?>

<?php $this->start('body'); ?>
    <div class="padding-large" id="main">
        <div class="container padding-32 center black" id="home">
            <h1 class="jumbo"><span class="hide-small">Welcome to</span> Camagru.</h1>

                <form action="register" method="post">
                    <input type="submit" name="register" value="Register">
                </form>

        </div>
    </div>
<?php $this->end(); ?>
