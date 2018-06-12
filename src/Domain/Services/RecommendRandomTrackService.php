<?php 

namespace Kmilo93sd\Domain\Services;

use Kmilo93sd\Domain\Spotify\SpotifyClient;
use Kmilo93sd\Infrastructure\Genre\GenreMysqlRepository;
use Kmilo93sd\Infrastructure\AccessToken\AccessTokenMysqlRepository;

class RecommendRandomTrackService
{
	private $spotifyClient;
	private $genreRepository;
	private $accessTokenRepository;

	public function __construct()
	{
		$this->spotifyClient = new SpotifyClient;
		$this->genreRepository = new GenreMysqlRepository;
		$this->accessTokenRepository = new AccessTokenMysqlRepository;
	}

	public function execute()
	{
		$token = $this->accessTokenRepository->get();
		$genre = $this->genreRepository->getRandom();

		return $this->spotifyClient->recommendByGenre($genre, $token);
	}
}