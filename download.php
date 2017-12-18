<?php
/**
 * Created by PhpStorm.
 * User: CHARITY PRODUCTIONS
 * Date: 10/11/2017
 * Time: 7:06 PM
 */
if(isset($_POST['song_name'])) {
    $file = $_POST['song_name'];
    header('Content-type: audio/mpeg3');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('contents/'.$file);
    exit();
} else {
    echo 'not set';
}