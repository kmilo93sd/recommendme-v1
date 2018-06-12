<?php 

namespace Kmilo93sd\Https;

use Kmilo93sd\Domain\Services\RecommendRandomTrackService;

class RecommendationController
{
	
	public function getRandom()
	{
		$service = new RecommendRandomTrackService;

		$response = json_decode($service->execute());

		//esto devuelve el link del artista relacionado con el album
		//print_r($response->tracks[0]->artists[0]->external_urls->spotify);
		//esto devuelve el nombre del artista relacionado con el album
		//print_r($response->tracks[0]->artists[0]->name);


		//esto devuelve el link del disco
		//print_r($response->tracks[0]->album->external_urls->spotify);
		//esto devuelve info sobre la imagen del disco desde spotify
		//print_r($response->tracks[0]->album->images[0]);
		//esto devuelve el nombre del disco desde spotify
		//print_r($response->tracks[0]->album->name);
		//esto devuelve el link del artista relacionado con el album
		//print_r($response->tracks[0]->album->artists[0]->external_urls->spotify);
		//esto devuelve el nombre del artista relacionado con el album
		//print_r($response->tracks[0]->album->artists[0]->name);

		//esto devuelve el link de la pista a spotify
		//print_r($response->tracks[0]->external_urls);
		//esto devuelve el nombre de la pista de spotify
		//print_r($response->tracks[0]->name);
	}

	public function getByGenre()
	{
		
	}
}
