<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use Library\WikipediaApi;
use Library\TvMazeApi;

// PHP-Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

if (isset($_POST['query']) && isset($_POST['api'])) {

    switch($_POST['api']) {
        case 'WIKIPEDIA':
            $api = new WikipediaApi();
            break;
        case 'TVMAZE':
            $api = new TvMazeApi();
            break;
        default:
            $api = NULL;
            die();
    }

    $api->setSearchQuery($_POST['query']);

    try {
        $client = new HttpClient();
        $response = $client->request(
            'GET',
            $api->getApiUrl(),
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json'
                ]
            ]
        );
        $apiResults = json_decode($response->getBody());
    } catch (RequestException $exception) {
        print $exception;
        die();
    }

    $results = $api->parseApiResults($apiResults);

    echo '<h1>' . $api->getApiName() . '</h1>';

    echo '<ul>';
    foreach ($results as $result) {
        print '<li>';
        print '<a href="' . $api->getApiResultUrl($result) . '" target="_blank">';
        print $api->getApiResultTitle($result);
        print '</a>';
        print '</li>';
    }

    echo '</ul>';








}
