<?php 

namespace Kmilo93sd\Infrastructure\Spotify;

use Kmilo93sd\Infrastructure\Spotify\AccessToken;

class SpotifyApiHandler
{
	const TOKEN_TYPE = 'Bearer';
	

	public function getGenres($accessToken)
	{		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/recommendations/available-genre-seeds');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', $this->headerAuthString($accessToken))); 
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function getRecommendation($genre, $accessToken)
	{
		$baseUrl = 'https://api.spotify.com/v1/recommendations';
		$seedsValues = '?seed_genres=' . $genre['name'];
		
		$fullUrl = $baseUrl . $seedsValues;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $fullUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($this->headerAuthString($accessToken))); 

		return curl_exec($ch);
	}

	private function headerAuthString($accessToken)
	{
		return 'Authorization: Bearer ' . $accessToken; 
	}

}