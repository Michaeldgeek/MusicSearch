<?php

ob_start("ob_gzhandler");
require 'vendor/autoload.php';

$callback = filter_input(INPUT_GET, "callback");
$query = filter_input(INPUT_GET, "q");

if (is_null($callback) || is_bool($callback) || empty($callback)) {
    // log error
    die();
} else if (is_null($query) || is_bool($query) || empty($query)) {
    // log error
    die();
}


$DEVELOPER_KEY = 'AIzaSyAbuhgryIHr1MPHguh33Lw2lJu1-mrf3Kk';

$youtube = new Madcoda\Youtube\Youtube(array('key' => $DEVELOPER_KEY));

$search = $youtube->searchVideos($query, 15);

$results = array();
$count = count($search);
$results['count'] = $count;

for ($i = 0; $i < $count; $i++) {
    $row['bitrate'] = 192;
    $row['duration'] = '';
    $row['id'] = $i + 1;
    $row['link']['href'] = '';
    $row['link']['target'] = '_self';
    $row['player'] = "true";
    $row['source']['data'] = $search[$i]->id->videoId;
    $row['source']['id'] = $i + 1;
    $row['source']['name'] = "YouTube";
    $row['title']['default'] = $search[$i]->snippet->title;
    $row['title']['base64'] = "none";
    array_push($results, $row);
}
$results['query'] = $query;
$str = json_encode($results);
$str = "" . $callback . "(" . $str . ")";
header("Content-Type: text/html");
echo ($str);

ob_end_flush();
//echo (json_encode($video));
