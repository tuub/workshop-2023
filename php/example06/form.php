<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

// PHP-Fehlermeldungen anzeigen
error_reporting(E_ALL);
ini_set('display_errors', true);

if (isset($_POST['query']) && isset($_POST['api'])) {
    switch($_POST['api']) {
        case 'WIKIPEDIA':
            $api = 'wikipedia';
            $apiUrl = 'https://de.wikipedia.org/w/api.php?action=query&list=search&utf8=&format=json&srsearch=' . urlencode($_POST['query']);
            break;
        case 'TVMAZE':
            $api = 'tvmaze';
            $apiUrl = 'https://api.tvmaze.com/search/shows?q=' . urlencode($_POST['query']);
            break;
        default:
            $api = NULL;
            $apiUrl = NULL;
            die();
    }

    try {
        $client = new HttpClient();
        $response = $client->request(
            'GET',
            $apiUrl,
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json'
                ]
            ]
        );
        $results = json_decode($response->getBody());
    } catch (RequestException $exception) {
        print $exception;
        die();
    }

    if ($api == 'wikipedia') {
        $records = $results->query->search;
    } elseif ($api == 'tvmaze') {
        $records = $results;
    }

    echo '<h1>' . strtoupper($api) . '</h1>';
    echo '<ul>';

    foreach ($records as $record) {
        if ($api == 'wikipedia') {
            $pageTitle = $record->title;
            $pageUrl = 'https://de.wikipedia.org/?curid=' . $record->pageid;
        } elseif ($api == 'tvmaze') {
            $pageTitle = $record->show->name;
            $pageUrl = $record->show->url;
        }

        print '<li>';
        print '<a href="' . $pageUrl . '" target="_blank">';
        print $pageTitle;
        print '</a>';
        print '</li>';
    }

    echo '</ul>';








}
