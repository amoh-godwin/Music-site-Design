<?php
/**
 * Created by PhpStorm.
 * User: CHARITY PRODUCTIONS
 * Date: 11/13/2017
 */
include 'functions/function.php';
include 'functions/conn.php';

$id = $_GET['uid'];

$sql = "SELECT plays FROM `song_list` WHERE id=$id";
if($run = $conn->query($sql)) {

    if($result = $run->fetch_assoc()) {
        $old_no = $result['plays'];
        $new_no = $old_no + 1;

        $sql1 = "UPDATE `song_list` SET plays=$new_no WHERE id=".$id;
        if($run1 = $conn->query($sql1)) {
            echo $new_no. '|1';
        } else {
            echo $conn->error;
        }
    }
} else {
    echo $conn->error;
}