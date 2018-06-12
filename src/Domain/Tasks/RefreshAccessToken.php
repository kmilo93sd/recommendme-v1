<?php 

namespace Kmilo93sd\Domain\Tasks;

use Kmilo93sd\Domain\Spotify\SpotifyClient;
use Kmilo93sd\Infrastructure\AccessToken\AccessTokenMysqlRepository;

class RefreshAccessToken
{

	private $spotifyClient;
	private $accessTokenRepository;

	public function __construct()
	{
		$this->spotifyClient = new SpotifyClient;
		$this->accessTokenRepository = new AccessTokenMysqlRepository;
	}

	public function execute($clientId, $secretKey)
	{
		$token = $this->getToken($clientId, $secretKey);
		$this->accessTokenRepository->emptyTable();
		$this->accessTokenRepository->save($token);
	}

	private function getToken($clientId, $secretKey)
	{
		$response = $this->spotifyClient->getAccessToken(
			$clientId, 
			$secretKey
		);

		return $response->access_token;
	}
}