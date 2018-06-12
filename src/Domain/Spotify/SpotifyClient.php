<?php 

namespace Kmilo93sd\Domain\Spotify;

use Kmilo93sd\Infrastructure\Spotify\Authenticator;
use Kmilo93sd\Infrastructure\Spotify\SpotifyApiHandler;

class SpotifyClient
{
	public function getAccessToken($clientId, $secretKey)
	{
		$authenticator = new Authenticator();
		return $authenticator->authenticate($clientId, $secretKey);
	}

	public function recommendByGenre($genre, $accessToken)
	{
		$apiHandler = $this->buildApiHandler();
		return $apiHandler->getRecommendation($genre, $accessToken);
	}

	public function getGenres($accessToken)
	{
		$apiHandler = $this->buildApiHandler();

		return $apiHandler->getGenres($accessToken);
	}

	private function buildApiHandler()
	{
		return new SpotifyApiHandler();
	}
}