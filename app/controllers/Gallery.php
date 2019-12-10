<?php

class Gallery extends Controller {
    
    public $_db;
    public $images;
    public $comments;
    public $n = 0;
    public $start = [];
    public $next = [];
    public $prev = [];

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->_db = DB::getInstance();
    }

    public function setup() {
        $images = [];
        $comments = [];
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        $this->comments = $this->_db->query('SELECT * FROM comments')->results();
        // dnd($this->comments);
        foreach ($this->images as $img) {
            // dnd($img);
            foreach ($this->comments as $comment) {
                // dnd($comment);
                // $comments[] = 'dummy';
                if ($comment->post == $img->id) {
                    $comments[] = $comment->text;
                }
            }
            $images[] = [
                'image' => $img->img,
                'likes' => $img->likes,
                'comments' => $comments
            ];
            $comments = [];
        }
        // dnd($images);
        $this->n = count($images);
        $i = $_POST['count'];
        $count = 5;
        $start = 1;
        if (isset($_POST['start']) && $_POST['start']) {
            
            while ($i < $this->n - 1 && $count) {
                echo "<div id='imagess'>";
                    echo "<img src='" . $images[$i]['image'] . "' style='width: 25%'><p></p>";
                echo "</div>";
                echo "<div id='likes'>";
                    echo "<input class='button text-black grey' id='like' name='next' type='submit' value='Like'/>";
                    echo "<p> Likes: " . $images[$i]['likes'] . "</p>";
                echo "</div>";
                if ($images[$i]['comments']) {
                    echo "<div style='display: inline-flex'>";
                        echo "<a class='prev' onclick='plusSlides(-1)'>&#10094; Prev</a>";
                    echo "</div>";
                    echo "<div id='comments' class='slideshow-container' style='display: inline-flex'>";
                    foreach ($images[$i]['comments'] as $text) {
                        if ($start) {
                            echo "<div class='comments fade center' style='display: block'>";
                                echo "<p>" . $text . " </p>";
                            echo "</div>";
                        } else {
                            echo "<div class='comments fade center' style='display: none'>";
                                echo "<p>" . $text . " </p>";
                            echo "</div>";
                        } 
                        $start = 0;
                    }
                    echo "</div>";
                    echo "<div style='display: inline-flex'>";
                            echo "<a class='next' onclick='plusSlides(1)'>Next &#10095;</a>";
                        echo "</div>";
                    echo "<div class='padding-16'>";
                        echo "<a class='prev' onclick='allSlides()'> All Comments </a>";
                    echo "</div>";
                } else {
                    echo "<div class='center'>";
                    echo "<p> No comments</p>";
                    echo "</div>";
                }
                $i++;
                $count--;
            }
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . $i . "</p>";
        }
    } 

    public function display() {
        $images = [];
        $comments = [];
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        $this->images = $this->_db->query('SELECT * FROM posts')->results();
        foreach ($this->images as $img) {
            $images[] = ['image'=>$img->img, 'likes'=>$img->likes]; 
        }
        $this->n = count($images);
        $i = $_POST['count'];
        $count = 5;
        if (isset($_POST['next']) && $_POST['next']) {
            while ($i < $this->n && $count) {
                echo "<p>" . $images[$i]['likes'] . "</p>";
                echo "<input class='button text-black grey' id='like' name='next' type='submit' value='Like'/>";
                echo "<p>likes: " . $images[$i]['likes'] . "</p>";
                echo "<p>comments</p>";
                $i++;
                if ($i == $this->n) {
                    $i = 0;
                }
                $count--;
            }
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . $i . "</p>";
        } else if (isset($_POST['prev']) && $_POST['prev']) {
          
            while ($i >= 0 && $count) {
                echo "<p>" . $images[$i]['likes'] . "</p>";
                echo "<input class='button text-black grey' id='like' name='next' type='submit' value='Like'/>";
                echo "<p>likes: " . $images[$i]['likes'] . "</p>";
                echo "<p>comments</p>";
                if ($i == 0) {
                    $i = $this->n;
                }
                $i--;
                $count--;
            }
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . $i . "</p>";
        } else {
            echo "<p>No photos</p>";
            echo "<p style='display: none; color: black;' id='counter' name='count'>" . 0 . "</p>";
        }
        unset($_POST['prev']);
        unset($_POST['next']);
    }

    public function index() {
        $this->view->render('gallery');
    }

}