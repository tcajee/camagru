<?php

class Registration extends Controller {

    public static function CreateView($viewName) {
        require_once("./Views/$viewName.php");
    }
}
?>
