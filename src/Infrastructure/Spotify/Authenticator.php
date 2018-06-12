<?php 

namespace Kmilo93sd\Infrastructure\Spotify;

use Kmilo93sd\Infrastructure\Spotify\Credentials;

class Authenticator
{
	const AUTHENTICATE_URI = 'https://accounts.spotify.com/api/token';
	const AUTHENTICATE_METHOD = 'POST';
	const GRANT_TYPE = 'client_credentials';
	const CONTENT_TYPE = 'Content-Type: application/x-www-form-urlencoded';

	/*
		return a Json access token provided by Spotify
		
		{
			'access_token' : 'AnyToken',
			'token_type'   : 'Bearer',
			'expires_in'   : 3600,
			'scope'        : ''
		}
	 */
	public function authenticate($clientId, $secretKey)
	{ 	
		$encodedAuthenticationString = $this->encodeCredentialInBase64($clientId, $secretKey);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($encodedAuthenticationString));
		
		return json_decode(curl_exec($ch));
	}

	private function encodeCredentialInBase64($clientId, $secretKey)
	{
		return 'Authorization: Basic '.base64_encode($clientId . ':' . $secretKey); 
	}

}