<?php

class Instagram {
    const ENDPOINT_USERS      = '/media/recent/';
    const TIMEOUT_DEFAULT_SEC = 30;

    protected $_api_root      = 'https://api.instagram.com/v1/users/';
    protected $_token;

    public function __construct( $token ) {
        $this->_token = $token;
    }

    public function getUserId( $username ) {
    	$endpoint = $this->_api_root . 'search?q=' . $username . '&access_token='. $this->_token;
    	$request  = $this->_executeRequest( $endpoint );

		foreach(json_decode($request)->data as $user){
			$userid = $user->id;
		}

    	return $userid;
    }

    public function getUserPhotos( $id, $count ) {
    	$endpoint = $this->_api_root . $id . self::ENDPOINT_USERS . '?access_token='. $this->_token . '&count=' . $count;

    	return $this->_executeRequest( $endpoint );
    }

	protected function _executeRequest($url) {
		$user_agent = "Instagram API/PHP";

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Accept: application/json', 'Content-Type: multipart/form-data', 'Expect:' ));
		curl_setopt($ch, CURLOPT_TIMEOUT, self::TIMEOUT_DEFAULT_SEC);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPGET, 1);

		$response = curl_exec($ch);
		return $response;

		curl_close($ch);
	}
}