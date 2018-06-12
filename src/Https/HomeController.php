<?php 

namespace Kmilo93sd\Https;

use Kmilo93sd\Domain\Tasks\RefreshAccessToken;

class HomeController
{
	public function test()
	{
		$refreshToken = new RefreshAccessToken;
		$refreshToken->execute();
	}
}