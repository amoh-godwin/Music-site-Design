<?php
/**
 * Created by PhpStorm.
 * User: CHARITY PRODUCTIONS
 * Date: 11/8/2017
 */
include '../function.php';
include '../conn.php';

$song_list;
$title;
$artist;
$size;
$filename;
$row_tags;
$json = '';
$to_return= array();
$total_out = '';

if(isset($_GET['q'])) {
    $query = $_GET['q'];
    $total_out .= 'q, ';
    $query_pattern = '/' . $query . '/i';
    $sql = "SELECT * FROM `song_list`";
    $total_out .= 'sql, ';
    if($request = $conn->query($sql)) {
        while($row = $request->fetch_assoc()) {
            $row_id = $row['id'];
            $title[$row_id] = $row['song_title'];
            $artist[$row_id] = $row['artist'];
            $size[$row_id] = $row['size'];
            $filename[$row_id] = $row['file_name'];
            $row_tags[$row_id] = $row['tags'];
        }
    } else {
        echo $conn->error;
    }

    foreach($row_tags as $k => $v) {
        $break_down = explode(',', $v);
        for ($x = 0 ; $x < count($break_down); $x++) {
            if(preg_match($query_pattern, $break_down[$x])) {
                if(!in_array($k, $to_return)) {
                    array_push($to_return, $k);
                }
            } else {
            }
        }
    }

    foreach ($to_return as $key) {
        $json .= '|';
        $json .= $artist[$key] . ',';
        $json .= $title[$key] . ',';
        $json .= $filename[$key] . ',';
        $json .= $key . ',';
        $json .= $size[$key];
    }

    echo $json;
}