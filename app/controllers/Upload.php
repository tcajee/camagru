<?php

class Upload extends Controller {
    
    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }

    public function index() {
       $this->view->render('upload');
    }

    public function upload() {

        if (isset($_POST['img'])) {
            $img = $_POST['img'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = 'image_' . date('YmdHis') . '.png';
            file_put_contents($file, $data);
        } else {
            echo "Error: No image data";
        }


        // if (preg_match('/^data:image\/(\w+);base64,/', $file, $type)) {
            //     $data = substr($file, strpos($file, ',') + 1);
        //     $type = strtolower($type[1]);
        //     if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
        //         throw new \Exception('invalid image type');
        //     }
        //     $data = base64_decode($data);
        //     if ($data === false) {
        //         throw new \Exception('base64_decode failed');
        //     }
        // } else {
        //     throw new \Exception('did not match data URI with image data');
        // }
        // file_put_contents("img.{$type}", $data);
        // list($type2, $data2) = explode(';', $file);
        // list(, $data2) = explode(',', $data2);
        // $fileExtension = substr($file, strpos($file, "/") + 1);
        // $decodedData = base64_decode($file);
        // $newImage = fopen("test.png" , "w");
        // fwrite($newImage, $decodedData);

    }

}