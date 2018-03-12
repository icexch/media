<?php

namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;

class AdCheckContentService {

    private $client;
    private $selectors;

    /**
     * AdCheckContentService constructor.
     * @param array $selectors
     */
    public function __construct(
        array $selectors = ['[href]' => 'href', '[src]' => 'src']
    ) {
        $this->selectors = $selectors;
        $this->client = new Client([
            'http_errors' => false
        ]);
    }

    public function checkItem(string $html) {
        $selectors = ['[href]' => 'href', '[src]' => 'src'];
        $items = [];
        $crawler = new Crawler($html);
        $hashArray = [];

        foreach($selectors as $selector => $attr) {
            foreach ($crawler->filter($selector) as $domElement) {
                if($value = $domElement->getAttribute($attr)) {
                    $items[] = $value;
                }
            }
        }
        if(count($items) < 1) {
            return null;
        }

        for ($i=0;$i<count($items);$i++) {
            if($content = $this->getContent($items[$i])) {
                $hash = hash('sha256', $content);
                $hashArray[] = $hash;
            }
        }

        return hash('sha256', implode(',', $hashArray));
    }

    private function getContent(string $url) {
        $response = $this->client->get($url);
        if($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        }
        return null;
    }
}