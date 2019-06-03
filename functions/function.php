<?php
function redirect_to($new_lotion) {
    header('Location: '. $new_lotion);
}

function smartTime($time) {
    return date("d-m", $time);
}

function getBrowser() {
    $browserArray = array(
        'Windows Mobile' => 'IEMobile',
        'Android Phone' => 'Android',
        'IPhone Mobile' => 'iPhone',
        'Mozilla Firefox' => 'Firefox',
        'Google Chrome' => 'Chrome',
        'Internet Explorer' => 'MSIE',
        'Opera Browser' => 'Opera',
        'Safari' => 'Safari'
    );

    return $browserArray;
}

function getOs() {
    $osArray = array(
        'Windows 7' => 'Windows NT 6.1'
    );

    return $osArray;
}

function getSession() {
    $sessionArray = array("username", "browser", "os", "country", "referer", "views", "edits", "deletes", "authors", "series", "hours");
    
    return $sessionArray;
}

function getSessDbname() {
    $sessionDbnameArray = array("username", "browser", "os", "country", "referer", "views", "edits", "deletes", "authors", "series", "duration");
    
    return $sessionDbnameArray;
}


?>