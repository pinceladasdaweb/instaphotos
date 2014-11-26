<?php
require_once( './api/Instagram.class.php' );

$username = isset($_GET['user']) ? $_GET['user'] : NULL;
$count    = isset($_GET['count']) ? $_GET['count'] : 12;
$token    = '<PUT YOUR TOKEN HERE>';

$api = new Instagram( $token );

$id     = $api->getUserId( $username );
$photos = $api->getUserPhotos( $id, $count );

header('Content-type: application/json');
echo $photos;