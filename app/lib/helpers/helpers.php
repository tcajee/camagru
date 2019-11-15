<?php

function dnd($data) {

    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}


function debug_string_backtrace() {
    ob_start();
    debug_print_backtrace();
    $trace = ob_get_contents();
    ob_end_clean();

    // $trace = preg_replace('/^#0\s+' . __FUNCTION__ . "[^\n]*\n/", '', $trace, 1);
    // $trace = preg_replace('/^#1\s+' . 'dump' . "[^\n]*\n/", '', $trace, 1);
    
    // $trace = preg_split('/#/', $trace);
    // array_shift($trace);
    // array_shift($trace);
    // $dump = $trace[0];
    // $dump = preg_split('/ /', $dump);
    // $dump = preg_replace('/\s\s+/', '', $dump[array_key_last($dump)]); 
    // array_shift($trace);
    // return [$dump, $trace]; 
    
    return $trace; 
}

function dump($text, $data = '') {
   
    $call = debug_string_backtrace();
    
    echo '<pre>';

    // echo "<html><head><style></style></head><body>";
        // echo '<div>';

            // echo "--> " . $text . " || " . $call[0];
            // if ($data != '') {
                // var_dump($data);
            // } else {
                // echo "";
            // }
            // if ($call[1]) {
                // foreach ($call[1] as $line) {
                    // echo "  > " . $line;
                // } 
            // }
        // echo '</div>';
    // echo "</body></html>";

    echo '</pre>';
}

function sanitize($dirty) {
    return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}

function currentUser() {
    return Users::currentUser();
}