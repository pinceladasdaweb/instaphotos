<?php
header('Content-type: application/json');

function get_curl($url) {
    if(function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
        $output = curl_exec($ch);
        echo curl_error($ch);
        curl_close($ch);
        return $output;
    } else{
        return file_get_contents($url);
    }
}

$username    = isset($_GET['user']) ? $_GET['user'] : NULL;
$count       = isset($_GET['count']) ? $_GET['count'] : 12;
$accessToken = "YOUR_ACCESS_TOKEN_HERE";
$getUser     = "https://api.instagram.com/v1/users/search?q=".urlencode($username)."&access_token=".urlencode($accessToken);
$getId       = get_curl($getUser);

foreach(json_decode($getId)->data as $user){
	$userid = $user->id;
}

$getImages  = "https://api.instagram.com/v1/users/".urlencode($userid)."/media/recent/?access_token=".urlencode($accessToken)."&count=".urlencode($count);
$loadImages = get_curl($getImages);
$instagrams = json_decode($loadImages)->data;
$photos     = array();

foreach ($instagrams as $instagram){
    $photos[] = array(
		'image' => $instagram->images->low_resolution->url,
		'url' => $instagram->link,
		'likes' => $instagram->likes->count,
		'description' => $instagram->caption ? $instagram->caption->text : null
    );
}

echo json_encode($photos);
?>