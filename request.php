<?php
require_once( './api/Instagram.class.php' );

$username = isset($_GET['user']) ? $_GET['user'] : NULL;
$count    = isset($_GET['count']) ? $_GET['count'] : 12;
$token    = '966633.5b9e1e6.af5ba38b258641ea95fc23d378809a41';

$api = new Instagram( $token );

$id     = $api->getUserId( $username );
$photos = $api->getUserPhotos( $id, $count );

header('Content-type: application/json');
echo $photos;