<?php 

use Kmilo93sd\Domain\Tasks\RefreshAccessToken;



$clientId = SPOTIFY_CREDENTIALS['clientId'];
$secretKey = SPOTIFY_CREDENTIALS['secretKey'];

$task = new RefreshAccessToken;
$task->execute($clientId, $secretKey);