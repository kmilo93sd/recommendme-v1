<?php 

$requestUri = $_SERVER['REQUEST_URI'];

use Kmilo93sd\Https\HomeController;
use Kmilo93sd\Https\RecommendationController;

switch ($requestUri) {
	
	case '/':
			
			echo "hi";
		break;
	
	case '/test-refresh-token':

		include __DIR__ . '/Domain/Tasks/RefreshAccessTokenTaskHandler.php';

		break;

	case '/test-update-local-genres':

		include __DIR__ . '/Domain/Tasks/UpdateLocalGenresTaskHandler.php';

		break;

	case '/test-get-recommendation-random':

			$controller = new RecommendationController;
			$controller->getRandom();
	break;

	default:
		echo "Pagina no encontrada";
		
		break;
}