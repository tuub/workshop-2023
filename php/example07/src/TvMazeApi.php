<?php

namespace Library;

class TvMazeApi
{
    public string $searchQuery;
    public string $apiName;

    public function __construct()
    {
        $this->apiName = 'TV Maze API';
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
        return 'https://api.tvmaze.com/search/shows?' .
            'q=' . urlencode($this->searchQuery);
    }

    public function parseApiResults(array $apiResults): array
    {
        return $apiResults;
    }

    public function getApiResultTitle($apiResult): string
    {
        return $apiResult->show->name;
    }

    public function getApiResultUrl($apiResult): string
    {
        return $apiResult->show->url;
    }
}