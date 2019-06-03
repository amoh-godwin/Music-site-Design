<?php
/**
 * Created by PhpStorm.
 * User: CHARITY PRODUCTIONS
 * Date: 10/11/2017
 * Time: 7:08 PM
 */
include 'functions/conn.php';
include 'functions/function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank you Heavenly Father</title>
    <link href="css/w3.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link href="fa/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        nav {
            display: flex;
            align-content: center;
        }

        nav a {
            display: block;
            text-decoration: none;
            color: orange;
        }

        nav a:hover {
            text-decoration: underline;
        }

        nav ul {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
<nav class="w3-padding-large w3-black" style="height: 50px;">
    <ul class="w3-margin-0 w3-padding-0">
        <li style="margin-left: auto;">
            <a href="./upload.html">Upload</a>
        </li>
    </ul>
</nav>
<advertisement class="w3-deep-purple" style="display: flex; height: 250px; justify-content: center; align-items: center;">
    <h4>Welcome, To the Home of Music</h4>
</advertisement>
<main class="full" style="">
    <article class="w3-padding-large threequarter w3-white" style="display: flex; flex-wrap: wrap;">
        <form method="post" style="width: 100%;" action="download.php">
        <?php
            $sql = "SELECT * FROM song_list";
            if($result = $conn->query($sql)) {
                while($track = $result->fetch_assoc()) {
                    $song = $track['song'];
                    $artist = $track['artist'];
                    $file = $track['file_name'];
                    $tags = $track['tags'];
                    $count = $track['downloads_count'];

                    echo '<meta name="keywords" content="'.$tags.'"/>
                        <div class="third w3-padding-large"><div class="w3-card-4" style="height: auto;">
                <div style="width: 100%; height: 200px;">
                    <img src="images/21568704_895447720606432_3201380884846477312_n.jpg" width="100%" height="100%" style="" />
                </div>
                <div style=" height: 100px; overflow: hidden;">
                    <div class="w3-padding-small" style="display: flex; flex-wrap: wrap; width: 100%;">
                        <h5 class="w3-padding-0 w3-margin-0 w3-text-indigo" style="width: 100%;"><b>'.$artist.'</b></h5>
                        <h5 class="w3-padding-0 w3-margin-0 w3-text-gray">'.$song.'</h5>
                    </div>
                    <ul class="w3-padding-small w3-margin-0" style="display: flex; flex-wrap: wrap; width: 100%; justify-content: center; align-items: center;">
                        <input type="hidden" value="'.$file.'" name="song_name" />
                        <input type="submit" value="Download" class="w3-green w3-btn" />
                        <li class="w3-text-green"><i class="fa fa-download w3-padding-tiny w3-text-black"></i>'.$count.'</li>
                    </ul>
                </div>
            </div></div>
                    ';

                }
            }
        ?>
        </form>
    </article>
    <aside class="w3-padding-large w3-deep-orange quarter" style="display: flex;"></aside>
</main>
<footer class="w3-padding-large w3-black" style="display: flex; height: 50px;"></footer>
</body>
</html>