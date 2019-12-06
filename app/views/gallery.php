<?php $this->setSiteTitle('Gallery') ?>

<?php $this->start('body'); ?>


  <script src="./js/gallery.js"></script>

    <div id="container" class="center black padding-16"> 
    
    <?php 
        $_db = DB::getInstance();
        $imgs = $_db->query('SELECT * FROM posts')->results();
        foreach ($imgs as $img) {
            echo "<img src=$img->img style='width: 30%'><p></p>";
        }
    ?>

    </div>



<?php $this->end(); ?>