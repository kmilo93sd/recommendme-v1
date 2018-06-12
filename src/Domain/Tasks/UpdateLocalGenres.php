<?php 

namespace Kmilo93sd\Domain\Tasks;

use Kmilo93sd\Domain\Spotify\SpotifyClient;
use Kmilo93sd\Infrastructure\Genre\GenreMysqlRepository;
use Kmilo93sd\Infrastructure\AccessToken\AccessTokenMysqlRepository;

class UpdateLocalGenres
{
	private $spotifyClient;
	private $genresRepository;
	private $accessTokenRepository;

	public function __construct()
	{
		$this->spotifyClient = new SpotifyClient;
		$this->genresRepository = new GenreMysqlRepository;
		$this->accessTokenRepository = new AccessTokenMysqlRepository;
	}

	public function execute()
	{
		$accessToken = $this->accessTokenRepository->get();
		$updatedGenres = $this->spotifyClient->getGenres($accessToken);
		$this->genresRepository->emptyTable();
		$this->genresRepository->updateAllGenres($updatedGenres);
	}


}