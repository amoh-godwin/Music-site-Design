<?php
/**
 * Created by PhpStorm.
 * User: CHARITY PRODUCTIONS
 * Date: 10/11/2017
 * Time: 5:02 PM
 */
include '../function.php';

include '../conn.php';
$upload_time = time();
$song = $_POST['song'];
$artist = $_POST['artist'];
$tags = $_POST['tags'];
$format = $_POST['format'];
$size = $_POST['size'];

$data = $_POST['base'];
$data_arr = explode('64,', $data);
$blob = base64_decode($data_arr[1]);

$uploader = $_SESSION['user'];

$filename = $artist . ' - ' . $song . '.' . $format;
chdir('contents');
$file = fopen('temp.txt', 'wb');
fclose($file);
file_put_contents('temp.txt', $blob);
if(file_exists($filename)) {
    $filename = '(1)' . $filename;
} else {
    $filename = $filename;
}
rename('temp.txt', $filename);
chdir('..');



$sql = "INSERT INTO song_list(song_title, file_name, artist, tags, uploaded_by, type, size, downloads, plays, album_art, upload_date, contributing_artist, Genre, ratings) VALUES('$song', '$filename', '$artist', '$tags', '$uploader', '$format', $size, 0, 0, '', $upload_time, '', '', 0)";
$result = $conn->query($sql);
if($result) {
    echo '<h4><a href="./user/songs">Click to go to our uploads</a></h4>';
} else {
    echo $conn->error;
}