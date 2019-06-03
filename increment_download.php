<?php
/**
 * Created by PhpStorm.
 * User: CHARITY PRODUCTIONS
 * Date: 11/13/2017
 */

include 'functions/function.php';

include 'functions/conn.php';

$id = $_GET['uid'];
$sql = "SELECT downloads FROM `song_list` WHERE id=$id";
if($run = $conn->query($sql)) {
    if($result = $run->fetch_assoc()) {
        $old = $result['downloads'];
        $new = $old + 1;

        $sql1 = "UPDATE `song_list` SET downloads=$new WHERE id=$id";
        if($run1 = $conn->query($sql1)) {
            echo $new .'|1';
        }
    }
}