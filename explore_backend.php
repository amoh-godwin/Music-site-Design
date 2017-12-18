<?php
/**
 * Created by PhpStorm.
 * User: CHARITY PRODUCTIONS
 * Date: 11/10/2017
 */

include '../function.php';

include '../conn.php';

$start = $_GET['start'];
$limit = $_COOKIE['p_n_o_e'];

$out  = '[ ';

$sql = "SELECT * FROM `song_list` LIMIT $limit OFFSET $start";

if($run = $conn->query($sql)) {

    while($list = $run->fetch_assoc()) {

        $out .= '{ "artist": "'.$list["artist"].'", ';
        $out .= '"tags" : "'. $list["tags"] .'", ';
        $out .= '"song" : "'.$list["file_name"].'", ';
        $out .= '"title" : "'.$list["song_title"].'", ';
        $out .= '"play_count" : "'.$list["plays"].'", ';
        $out .= '"id" : '.$list["id"] .', ';
        $out .= '"download_count" : "'. $list["downloads"] .'"}, ';

    }

    $new = preg_replace('/, $/', ' ', $out);

    $new .= ' ]';
    echo $new;

} else {
    echo $conn->error;
}