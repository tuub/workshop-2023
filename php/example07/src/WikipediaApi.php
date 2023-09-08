<?php

namespace Library;

class WikipediaApi
{
    public string $searchQuery;
    public string $apiName;

    public function __construct()
    {
        $this->apiName = 'Wikipedia API';
    }

    public function getApiName()
    {
        return $this->apiName;
    }

    public function setSearchQuery(string $searchQuery): void
    {
        $this->searchQuery = $searchQuery;
    }

    public function getApiUrl(): string
    {
        return 'https://de.wikipedia.org/w/api.php?' .
            'action=query&' .
            'list=search&' .
            'utf8=&' .
            'format=json&' .
            'srsearch=' . urlencode($this->searchQuery);
    }

    public function parseApiResults(object $apiResults): array
    {
        return $apiResults->query->search;
    }

    public function getApiResultTitle($apiResult): string
    {
        return $apiResult->title;
    }

    public function getApiResultUrl($apiResult): string
    {
        return 'https://de.wikipedia.org/?curid=' . $apiResult->pageid;
    }
}